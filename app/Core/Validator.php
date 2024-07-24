<?php
namespace App\Core;


class Validator {
    public static function validateName($name) {
        return preg_match("/^[a-zA-ZàâäéèêëîïôöùûüÿçÀÂÄÉÈÊËÎÏÔÖÙÛÜŸÇ'-]{2,}$/", $name);
    }

    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateTelephone($telephone) {
        return preg_match("/^(77|78|76|75|70)[0-9]{7}$/", $telephone);
    }

    public static function validateAddress($address) {
        return !empty($address); // Add more complex validation if needed
    }

    public static function validateFile($file) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if ($file['error'] != UPLOAD_ERR_OK) {
            return "Erreur lors de l'upload de la photo";
        }
        if (!in_array($file['type'], $allowedTypes)) {
            return "Format de fichier non supporté";
        }
        if ($file['size'] > 5000000) { // 5MB max
            return "Le fichier est trop volumineux";
        }
        return true;
    }

    public static function validateLogin($username, $password)
    {
        $errors = [];

        // Vérifier que le nom d'utilisateur n'est pas vide
        if (empty($username)) {
            $errors[] = 'Le nom d\'utilisateur est requis.';
        }

        // Vérifier que le mot de passe n'est pas vide
        if (empty($password)) {
            $errors[] = 'Le mot de passe est requis.';
        }

        // Vous pouvez ajouter d'autres validations selon vos besoins

        return $errors;
    }
}

