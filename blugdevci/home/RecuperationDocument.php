<?php
        $requete = $pdo->query('SELECT * FROM documentpdf');
        $compte = 1;
        while($data = $requete->fetch()){
            echo '<section class="telechargement-section">
                <div class="telechargement-box">'.'<p>'.'Un guide complet pour booster tes compétences en développement. Gratuit et pratique !'.'</p>'.
            '<img src="'. $data['cheminimage'].'" alt="Image document" class="imagedocument">'.
            '<p class= "contenutexte" >'. $data['NomPDF'] .'<br/> <br/>'.
                    ' <a download class="btn-telecharger" href="'.$data['Contenue'].'">' . '📥 Télécharger maintenant' . '</a> <br/> ' 
                .'</p>'.
            '</div>  </section>';
/*
            $compte++ ;
            if($compte == 10){
                echo '<div class="BoutonVoirPlus">' . 'Voir plus' .'</div>';
                break;
            }
                */
        }

    ?>