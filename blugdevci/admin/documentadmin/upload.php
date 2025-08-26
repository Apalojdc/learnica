<?php
    require __DIR__.'/../../login/connexion.php';
    if(!empty($_FILES)){
        //Gestion des pdf
        $file_name = $_FILES['pdfFile']['name'];
        $file_type = $_FILES['pdfFile']['type'];
        $file_extension = strrchr($file_name, ".");
      
        $extension_Autorisees = array('.pdf', '.Pdf', '.PDF');// recuperation de l'extension

        $file_tmp_name = $_FILES['pdfFile']['tmp_name']; // recuperation du nom

        $file_destination = '../files/' . $file_name; //destination de l\n'image
        // Gestion des images

        $Image_name = $_FILES['ImageFile']['name'];
        $Image_type = $_FILES['ImageFile']['type'];
        $Image_extension = strrchr($Image_name, ".");

        $extension_autorisee = array('.png', '.PNG','.Png','.JPG','.jpg','.Jpg','.JPEG','.jpeg','.Jpeg');
        $Image_tmp_name = $_FILES['ImageFile']['tmp_name'];
        $destination_Image = '../images/' .$Image_name;

        if(in_array($file_extension, $extension_Autorisees)){
            if(in_array($Image_extension,$extension_autorisee)){
                if(move_uploaded_file($file_tmp_name, $file_destination) and move_uploaded_file( $Image_tmp_name,$destination_Image)){
                    $requete = $pdo->prepare('INSERT INTO documentpdf(NomPDF, Contenue,imagesPDF,cheminimage) VALUES(?,?,?,?)');
                    $requete->execute(array($file_name, $file_destination, $Image_name, $destination_Image ));
                    echo "Fichié ajouté";
                }else{
                    echo 'Une erreur s\'est produite lors du téléchargement';
                }
            }else{
                echo "Seul les .png,.PNG,Png,JPG,jpg,Jpg,JPEG,jpeg,Jpeg sont autorisée";
            }

        }else{
            echo "Seul les .pdf, .Pdf et .PDF sont autorisée";
        }
    }

    // $requete = $pdo->query('SELECT * FROM documentpdf ORDER BY nomPDF ASC ');
    $recupe_documents = $pdo->prepare('SELECT * FROM documentpdf ORDER BY idPDF DESC');
    $recupe_documents->execute();

    $documents = $recupe_documents->fetchAll();

?>