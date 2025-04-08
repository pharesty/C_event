<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Affiche le tableau de bord administrateur.
     */
    public function dashboard()
    {
        // Stats pour le tableau de bord
        $activeEvents = Event::where('status', 'active')->count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $newUsers = User::whereDate('created_at', '>=', now()->subDays(30))->count();
        $totalParticipants = Reservation::sum('tickets');
        
        // Événements récents
        $recentEvents = Event::latest()->take(3)->get();
        
        // Réservations récentes
        $recentReservations = Reservation::with(['user', 'event'])
            ->latest()
            ->take(3)
            ->get();
            
        return view('admin.dashboard', compact(
            'activeEvents', 
            'pendingReservations', 
            'newUsers', 
            'totalParticipants',
            'recentEvents',
            'recentReservations'
        ));
    }
    
    /**
     * Affiche la liste des événements.
     */
    public function events()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function index (){
        return view('admin.dashboard');
    }
    
    /**
     * Affiche la liste des réservations.
     */
    public function reservations()
    {
        $reservations = Reservation::with(['user', 'event'])->latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }
    
    /**
     * Affiche les détails d'une réservation.
     */
    public function showReservation($id)
    {
        $reservation = Reservation::with(['user', 'event'])->findOrFail($id);
        return view('admin.reservations.show', compact('reservation'));
    }
    
    /**
     * Confirme une réservation.
     */
    public function confirmReservation(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'confirmed';
        $reservation->save();
        
        return redirect()->back()->with('success', 'Réservation confirmée avec succès.');
    }
    
    /**
     * Affiche la liste des utilisateurs.
     */
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    
    /**
     * Affiche la page des paramètres.
     */
    public function settings()
    {
        return view('admin.settings');
    }
}