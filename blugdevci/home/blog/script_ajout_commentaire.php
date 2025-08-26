<?php
                            echo "<pre>";
                                print_r( $_SESSION['user']['id_user']);
                            echo "</pre>";
                            if(isset($_POST['send'])){
                                session_start();
                                $comment_content = htmlspecialchars($_POST['comment_content']);
                                $ajout_commentaire = $pdo->prepare('INSERT INTO commentaire(id_user_commente, id_article_commente,content_commente) VALUES(:id_user, :id_article, :contenu)');
                                $ajout_commentaire->bindParam(':id_user', $_SESSION['user']['id_user']);
                                $ajout_commentaire->bindParam(':id_article', $article->id_article);
                                $ajout_commentaire->bindParam(':contenu', $comment_content);
                                $succes_send = $ajout_commentaire->execute();
                            }
                            
                        ?>