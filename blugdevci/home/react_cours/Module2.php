<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 2: Les Composants React</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #20232a;
            color: #61dafb;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 40px;
            padding: 20px;
            border: 1px solid #e1e1e1;
            border-radius: 6px;
        }
        .code-example {
            background-color: #20232a;
            color: #61dafb;
            padding: 20px;
            border-radius: 4px;
            overflow-x: auto;
            margin: 15px 0;
            font-family: monospace;
        }
        .note {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 15px 0;
        }
        .important {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 15px 0;
        }
        .exercise {
            background-color: #e7f5ff;
            border: 1px solid #74c0fc;
            padding: 20px;
            border-radius: 4px;
            margin: 15px 0;
        }
        .btn {
            background-color: #61dafb;
            color: #20232a;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            margin: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #4fa8c9;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Module 2: Les Composants React</h1>
            <p>Maîtrisez les composants fonctionnels, les props et l'état</p>
        </header>

        <section class="section">
            <h2>1. Les Composants Fonctionnels</h2>
            <p>Les composants fonctionnels sont la façon moderne d'écrire des composants React.</p>
            
            <div class="code-example">
                <pre>
import React from 'react';

function Salutation({ nom }) {
    return (
        &lt;div&gt;
            &lt;h2&gt;Bonjour {nom} !&lt;/h2&gt;
        &lt;/div&gt;
    );
}

// Utilisation :
&lt;Salutation nom="Alice" /&gt;</pre>
            </div>

            <div class="note">
                <strong>Note :</strong> Les composants fonctionnels sont plus simples et plus faciles à tester que les composants classe.
            </div>
        </section>

        <section class="section">
            <h2>2. Les Props</h2>
            <p>Les props sont les propriétés passées à un composant.</p>

            <div class="code-example">
                <pre>
function CarteProfil({ nom, titre, image }) {
    return (
        &lt;div className="carte"&gt;
            &lt;img src={image} alt={nom} /&gt;
            &lt;h3&gt;{nom}&lt;/h3&gt;
            &lt;p&gt;{titre}&lt;/p&gt;
        &lt;/div&gt;
    );
}

// Utilisation :
&lt;CarteProfil 
    nom="Marie Dupont"
    titre="Développeuse Frontend"
    image="/marie.jpg"
/&gt;</pre>
            </div>

            <div class="important">
                <strong>Important :</strong> Les props sont en lecture seule ! Ne modifiez jamais directement les props.
            </div>
        </section>

        <section class="section">
            <h2>3. L'État (State)</h2>
            <p>Le state permet de gérer les données qui peuvent changer dans un composant.</p>

            <div class="code-example">
                <pre>
import React, { useState } from 'react';

function Compteur() {
    const [compte, setCompte] = useState(0);

    return (
        &lt;div&gt;
            &lt;p&gt;Compteur: {compte}&lt;/p&gt;
            &lt;button onClick={() => setCompte(compte + 1)}&gt;
                Incrémenter
            &lt;/button&gt;
        &lt;/div&gt;
    );
}</pre>
            </div>

            <div class="note">
                <strong>Règles du State :</strong>
                <ul>
                    <li>Ne modifiez jamais le state directement</li>
                    <li>Les mises à jour du state peuvent être asynchrones</li>
                    <li>Les mises à jour sont fusionnées</li>
                </ul>
            </div>
        </section>

        <section class="section">
            <h2>4. Le Cycle de Vie des Composants</h2>
            <p>Avec les hooks, nous gérons le cycle de vie différemment des classes.</p>

            <div class="code-example">
                <pre>
import React, { useState, useEffect } from 'react';

function MonComposant() {
    const [donnees, setDonnees] = useState(null);

    useEffect(() => {
        // Équivalent à componentDidMount
        chargerDonnees();

        return () => {
            // Équivalent à componentWillUnmount
            nettoyage();
        };
    }, []); // Le tableau vide signifie "exécuter une seule fois"

    return (
        &lt;div&gt;
            {/* Affichage des données */}
        &lt;/div&gt;
    );
}</pre>
            </div>
        </section>

        <section class="section">
            <h2>Exercice Pratique</h2>
            <div class="exercise">
                <h3>Créez une Liste de Tâches</h3>
                <p>Créez un composant qui :</p>
                <ul>
                    <li>Affiche une liste de tâches</li>
                    <li>Permet d'ajouter une nouvelle tâche</li>
                    <li>Permet de marquer une tâche comme terminée</li>
                    <li>Utilise le state pour gérer les tâches</li>
                </ul>
                <a href="#" class="btn">Voir la solution</a>
            </div>
        </section>

        <section class="section">
            <h2>Points Clés à Retenir</h2>
            <ul>
                <li>Les composants fonctionnels sont préférés aux composants classe</li>
                <li>Les props sont en lecture seule et passent les données de parent à enfant</li>
                <li>Le state gère les données qui peuvent changer dans un composant</li>
                <li>useEffect remplace les méthodes de cycle de vie des classes</li>
            </ul>
        </section>

        <div style="text-align: center; margin-top: 30px;">
            <a href="introductionReact.php" class="btn">Module Précédent</a>
            <a href="#" class="btn">Module Suivant : Les Hooks</a>
        </div>
    </div>
</body>
</html>