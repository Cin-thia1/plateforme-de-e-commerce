<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LivreurController extends Controller
{
    /**
     * Afficher la liste des livreurs (avec leurs infos User)
     */
    public function index()
    {
        $livreurs = Livreur::with('user')->get();
        return response()->json($livreurs);
    }

    /**
     * Créer un nouveau livreur
     */
   public function store(Request $request)
    {
        // 1. Validation stricte
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'tel' => 'required|string',
            'dateNaissance' => 'required|date',
            'typeVehicule' => 'required|string',
            'zoneActivite' => 'required|string',
            'typeContrat' => 'required|in:temps plein,temps partiel,freelance',
            'matricule' => 'required|unique:livreurs,matricule',
            'photo' => 'nullable|image|max:2048'
        ]);

        try {
            $data = DB::transaction(function () use ($request) {
                // 2. Créer l'User
                $user = User::create([
                    'name' => $request->name,
                    'firstname' => $request->firstname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'type' => 'livreur',
                ]);

                // 3. Gérer la photo
                $path = null;
                if ($request->hasFile('photo')) {
                    $path = $request->file('photo')->store('livreurs', 'public');
                }

                // 4. Créer le Livreur via la relation
                // Note: user_id est automatiquement géré par la relation
                $livreur = $user->livreur()->create([
                    'name' => $request->name,
                    'firstname' => $request->firstname,
                    'tel' => $request->tel,
                    'dateNaissance' => $request->dateNaissance,
                    'typeVehicule' => $request->typeVehicule,
                    'zoneActivite' => $request->zoneActivite,
                    'typeContrat' => $request->typeContrat,
                    'matricule' => $request->matricule,
                    'photo' => $path ? Storage::url($path) : null,
                ]);

                return $livreur->load('user');
            });

            return response()->json([
                'message' => 'Livreur créé avec succès',
                'data' => $data
            ], 201);

        } catch (\Exception $e) {
            // ICI : Si ça échoue, on verra enfin pourquoi !
            return response()->json([
                'message' => 'Erreur lors de la création',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Afficher un livreur spécifique
     */
    public function show($id)
    {
        $livreur = Livreur::with('user')->findOrFail($id);
        return response()->json($livreur);
    }

    /**
     * Mettre à jour un livreur
     */
    public function update(Request $request, $id)
    {
        $livreur = Livreur::findOrFail($id);
        $user = $livreur->user;

        $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'matricule' => 'sometimes|unique:livreurs,matricule,' . $livreur->user_id . ',user_id',
            'typeContrat' => 'sometimes|in:temps plein,temps partiel,freelance',
        ]);

        $user->update($request->only(['name', 'email']));
        $livreur->update($request->except(['name', 'email', 'password']));

        return response()->json([
            'message' => 'Livreur mis à jour',
            'data' => $livreur->load('user')
        ]);
    }

    /**
     * Supprimer un livreur
     */
    public function destroy($id)
    {
        $livreur = Livreur::findOrFail($id);
        // La suppression du User entraînera celle du Livreur grâce au onDelete('cascade')
        $livreur->user->delete();

        return response()->json(['message' => 'Livreur supprimé avec succès']);
    }
}