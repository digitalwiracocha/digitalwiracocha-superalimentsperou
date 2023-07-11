<?php

// function createSummary($description, $maxLength = 100) {
//     // Supprimer les balises HTML
//     $text = strip_tags($description);

//     // Vérifier la longueur du texte
//     if (mb_strlen($text) <= $maxLength) {
//         return $text;
//     }

//     // Tronquer le texte jusqu'au dernier mot complet avant la limite de longueur
//     $truncatedText = mb_substr($text, 0, $maxLength);
//     $lastSpace = mb_strrpos($truncatedText, ' ');

//     if ($lastSpace !== false) {
//         $truncatedText = mb_substr($truncatedText, 0, $lastSpace);
//     }

//     // Ajouter des points de suspension à la fin du résumé
//     $summary = $truncatedText . '...';

//     return $summary;
// }

