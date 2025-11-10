<?php 
// Connexion a la base de données
include(__DIR__.'/../../login/connexion.php');
include(__DIR__.'/upload.php');
$recupe_categorie = $pdo->prepare('SELECT * FROM categorie ORDER BY titre_categorie ASC');
$recupe_categorie->execute();
$categories = $recupe_categorie->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un document</title>

    <style>
        /* Reset et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* En-tête */
        .header-document-uploader {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .header-document-uploader h1 {
            font-size: 36px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .subtitle {
            font-size: 16px;
            opacity: 0.95;
        }

        /* Carte de téléchargement */
        .upload-card {
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-title i {
            color: #667eea;
            font-size: 28px;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 25px;
        }

        /* Groupes de fichiers */
        .file-input-group {
            margin-bottom: 25px;
        }

        .file-input-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            font-size: 15px;
        }

        /* Style pour select et label de form-group */
        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            font-size: 15px;
        }

        /* Select personnalisé */
        .form-group select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 15px;
            color: #4a5568;
            background-color: white;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 20px;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group select:hover {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        }

        .form-group select option {
            padding: 10px;
            color: #4a5568;
        }

        .form-group select option:disabled {
            color: #a0aec0;
        }

        /* Container pour les radios */
        .form-group-radio {
            margin-bottom: 12px;
        }

        /* Style des radios personnalisés */
        .form-group-radio input[type="radio"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e0;
            border-radius: 50%;
            margin-right: 10px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
            vertical-align: middle;
        }

        .form-group-radio input[type="radio"]:hover {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group-radio input[type="radio"]:checked {
            border-color: #667eea;
            background-color: #667eea;
        }

        .form-group-radio input[type="radio"]:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background-color: white;
            border-radius: 50%;
        }

        .form-group-radio {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .form-group-radio:hover {
            background: #e9ecef;
        }

        .form-group-radio input[type="radio"]:checked + label,
        .form-group-radio:has(input[type="radio"]:checked) {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border: 1px solid #667eea;
        }

        /* Label des radios */
        .form-group-radio label {
            cursor: pointer;
            margin: 0;
            flex: 1;
            font-weight: 500;
            color: #4a5568;
            text-transform: capitalize;
        }

        .file-input-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
        }

        .file-input-button {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 24px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            border: 2px dashed #cbd5e0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-button:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            color: white;
        }

        .file-input-button i {
            font-size: 24px;
            color: #667eea;
        }

        .file-input-button:hover i {
            color: white;
        }

        .file-input-button span {
            font-weight: 500;
            color: #4a5568;
        }

        .file-input-button:hover span {
            color: white;
        }

        input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-name {
            display: none;
            padding: 10px 15px;
            background: #f0f4f8;
            border-radius: 8px;
            color: #4a5568;
            font-size: 14px;
            word-break: break-all;
        }

        /* Bouton de téléchargement */
        .upload-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .upload-btn:active {
            transform: translateY(0);
        }

        .upload-btn i {
            font-size: 20px;
        }

        /* Liste de documents */
        .document-list {
            background: white;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .document-list h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .document-list h2 i {
            color: #667eea;
            font-size: 28px;
        }

        /* Grille de documents */
        .document-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .document-list h2 {
            grid-column: 1 / -1;
        }

        /* Carte de document */
        .document-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .document-title {
            padding: 18px;
            font-weight: 600;
            color: #2d3748;
            font-size: 16px;
            background: white;
            border-bottom: 2px solid #e2e8f0;
        }

        .document-thumbnail {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .document-info {
            padding: 18px;
            background: white;
        }

        .document-download {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .document-download:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .document-download i {
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }
            
            .header-document-uploader h1 {
                font-size: 28px;
            }
            
            .upload-card,
            .document-list {
                padding: 25px;
            }
            
            .form-title,
            .document-list h2 {
                font-size: 20px;
            }
            
            .document-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .file-input-button {
                padding: 14px 18px;
            }
            
            .file-input-button span {
                font-size: 14px;
            }
            
            .upload-btn {
                padding: 14px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header-document-uploader">
            <h1>Gestionnaire de Documents</h1>
            <p class="subtitle">Importez et gérez vos fichiers PDF et images</p>
        </div>
        
        <div class="upload-card">
            <h2 class="form-title"><i class="fas fa-cloud-upload-alt"></i> Ajouter un nouveau document</h2>
            <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="file-input-group">
                    <label for="pdfFile">Document PDF</label>
                    <div class="file-input-container">
                        <div class="file-input-wrapper">
                            <div class="file-input-button">
                                <i class="fas fa-file-pdf"></i>
                                <span>Sélectionner un fichier PDF</span>
                            </div>
                            <input type="file" name="pdfFile" id="pdfFile" accept=".pdf" required>
                        </div>
                        <span class="file-name" id="pdfFileName">Aucun fichier sélectionné</span>
                    </div>
                </div>
                
                <div class="file-input-group">
                    <label for="ImageFile">Image de couverture</label>
                    <div class="file-input-container">
                        <div class="file-input-wrapper">
                            <div class="file-input-button">
                                <i class="fas fa-image"></i>
                                <span>Sélectionner une image</span>
                            </div>
                            <input type="file" name="ImageFile" id="ImageFile" accept="image/*" required>
                        </div>
                        <span class="file-name" id="imageFileName">Aucun fichier sélectionné</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie :</label>
                    <select name="categorie" id="categorie">
                        <option value="0" selected disabled>Selectionnez une catégorie</option>
                        <?php foreach($categories as $categorie): ?>
                        <option value="<?=htmlspecialchars_decode($categorie['id_categorie']) ?>"><?=htmlspecialchars_decode($categorie['titre_categorie']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type :</label>
                    <div class="form-group-radio">
                        <input type="radio" name="type" value="gratuit">gratuit</input>
                    </div>
                    <div class="form-group-radio">
                        <input type="radio" name="type" value="payant">payant</input>
                    </div>
                    <div class="form-group-radio">
                        <input type="radio" name="type" value="premium">premium</input>
                    </div>
                </div>
                
                <button type="submit" class="upload-btn">
                    <i class="fas fa-upload"></i>
                    Télécharger
                </button>
            </form>
        </div>
        
        <div class="document-list">
            <h2><i class="fas fa-folder-open"></i> Documents disponible</h2>
            
            <?php
            foreach($documents as $document){
                echo '<div class="document-card">';
                echo '<p class="document-title">' . $document['NomPDF'] . '</p>';
                echo '<img src="'. $document['cheminimage'].'" alt="Image document" class="document-thumbnail">';
                echo '<div class="document-info">';
                echo "<a href='<?php assets('../imagesite/Qrcode.jpg')?>".$document['Contenue']."' class=\"document-download\"><i class=\"fas fa-download\"></i> Télécharger le PDF</a>";
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    
    <script>
        // Afficher le nom du fichier PDF sélectionné
        document.getElementById('pdfFile').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
            const fileNameElement = document.getElementById('pdfFileName');
            fileNameElement.textContent = fileName;
            fileNameElement.style.display = 'block';
        });
        
        // Afficher le nom de l'image sélectionnée
        document.getElementById('ImageFile').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
            const fileNameElement = document.getElementById('imageFileName');
            fileNameElement.textContent = fileName;
            fileNameElement.style.display = 'block';
        });
    </script>
</body>
</html>