<?php

namespace App\Http\Controllers;

use App\Exceptions\MonException;
use App\metier\FraisHors;
use App\Models\User;
use App\dao\ServiceFraisHors;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;



class FraisHorsController extends Controller
{
    public function getFraisHors($id_fraisHors)
    {
        try {
            $unServiceFraisHors = new ServiceFraisHors();
            $mesFraisHors = $unServiceFraisHors->getFraisHors($id_fraisHors);
            return view('vues/listeFraisHors', compact('mesFraisHors'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function addFraisHors()
    {
        try {
            $erreur = '';
            $unFraisHors = "";
            $titreVue = "Ajout d'une fiche de Frais Hors Forfait";
            return view('vues/formFraisHors', compact('unFraisHors', 'titreVue', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
