<?php include('upload.php'); ?>
<?php include('../header/homeheader.php');?>
<link rel="stylesheet" href="styleadminpart.css">
</head>
<body>
<?php include("../navbar/NavBarAdmin.php")?>
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
                
                <button type="submit" class="upload-btn">
                    <i class="fas fa-upload"></i>
                    Télécharger
                </button>
            </form>
        </div>
        
        <div class="document-list">
            <h2><i class="fas fa-folder-open"></i> Documents disponible</h2>
            
            <?php
            while($data = $requete->fetch()){
                echo '<div class="document-card">';
                echo '<p class="document-title">' . $data['NomPDF'] . '</p>';
                echo '<img src="'. $data['cheminimage'].'" alt="Image document" class="document-thumbnail">';
                echo '<div class="document-info">';
                echo "<a href='<?php assets('../imagesite/Qrcode.jpg')?>".$data['Contenue'].'" class="document-download"><i class="fas fa-download"></i> Télécharger le PDF</a>';
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