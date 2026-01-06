<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LivreurController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LivraisonController;
use App\Http\Controllers\Api\PreuveController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OrderAPIController;
use App\Http\Controllers\Api\ProductAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Routes Publiques
Route::post('/login', [AuthController::class, 'login']);

// Routes Protégées
Route::middleware('auth:sanctum')->group(function () {
    
    // Pour l'ADMIN
    Route::middleware('check.admin')->group(function () {
        //Route::apiResource('livreurs', LivreurController::class);
        //mettre a jour la position d'un livreur
        Route::post('/livreurs/{idlivreur}/position', [PositionController::class, 'store']);
        //recuperer la liste des livreurs
        Route::get('/livreurs', [LivreurController::class, 'index']);

        //Creer un livreur
        Route::post('/livreurs', [LivreurController::class, 'store']);

        //supprimer un livreur
        Route::delete('/livreurs/{id}', [LivreurController::class, 'destroy']);

        //recuperer un livreur
        Route::get('/livreurs/{id}', [LivreurController::class, 'show']);

        //recuperer le profil admin
        Route::get('/me', [AuthController::class, 'profil']);

        // creer un produit
        Route::post('/products', [ProductAPIController::class, 'store']);

        // mise a jour et suppression d'un produit
        Route::post('/products/{id}', [ProductAPIController::class, 'update']); 
        Route::delete('/products/{id}', [ProductAPIController::class, 'destroy']);

        // Assigner un livreur à une commande
        Route::post('/commandes/assigner', [OrderAPIController::class, 'assignLivreur']);
        
        // Modifier l'assignation d'un livreur à une commande
        Route::post('/commandes/modifier-assignation', [OrderAPIController::class, 'updateAssignation']);

        // recuperer les livraisons d'un livreur
        Route::get('/livreurs/{idlivreur}/livraisons', [LivraisonController::class, 'livraisonsParLivreur']);
    });

    //mise a jour d'un livreur
    Route::post('/livreurs/{id}/update', [LivreurController::class, 'update']);
    
    //mise a jour du profil utilisateur (admin/livreur)
    Route::post('/user/update', [AuthController::class, 'updateProfile']);

    // Livraisons
    Route::apiResource('livraisons', LivraisonController::class);
    Route::patch('livraisons/{id}/status', [LivraisonController::class, 'updateStatus']);
    
    // Preuves & Positions
    Route::get('livraisons/{id}/preuves', [PreuveController::class, 'index']);
    Route::post('livraisons/{id}/preuves', [PreuveController::class, 'store']);
    Route::post('livraisons/{id}/positions', [PositionController::class, 'store']);
    Route::get('livraisons/{id}/positions', [PositionController::class, 'index']);

    // Tableau de bord livreur
    Route::get('livreur/dashboard', [LivraisonController::class, 'dashboard']);

    
    // Notifications
    /*Route::get('notifications', [NotificationController::class, 'index']);
    Route::patch('notifications/{id}/read', [NotificationController::class, 'markAsRead']);*/
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markRead']);
    Route::patch('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);

    
    // Récupérer toutes les commandes (avec détails complets)
    Route::get('/commandes', [OrderAPIController::class, 'index']);
    
    // Récupérer une commande spécifique par son ID
    Route::get('/commande/{idCommande}', [OrderAPIController::class, 'show']);
    
    // Annuler une commande
    Route::post('/commandes/annuler', [OrderAPIController::class, 'cancel']);

    //lister les produits et les details sur un seul
    Route::get('/products', [ProductAPIController::class, 'index']);
    Route::get('/products/{id}', [ProductAPIController::class, 'show']);





    // Endpoint pour déconnexion
    Route::post('/logout', [AuthController::class, 'logout']);

    // Endpoint pour vérifier l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});