<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de suppression</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .confirm-delete-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .confirm-delete-item {
            padding: 10px;
            margin: 10px 0;
            background: #f9f9f9;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .confirm-delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .confirm-delete-btn:hover {
            background: #c82333;
        }

        /* Modal styles */
        .confirm-delete-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 9999;
        }

        .confirm-delete-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            min-width: 300px;
        }

        .confirm-delete-modal-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .confirm-delete-btn-confirm {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .confirm-delete-btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .confirm-delete-btn-confirm:hover {
            background: #c82333;
        }

        .confirm-delete-btn-cancel:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="confirm-delete-container">
        <h1>Gestion des éléments</h1>
        
        <!-- Exemple d'éléments à supprimer -->
        <div class="confirm-delete-item" data-confirm-delete-id="1">
            <span>Élément 1</span>
            <button class="confirm-delete-btn" onclick="showConfirmDelete(1, 'Élément 1')">Supprimer</button>
        </div>
        
        <div class="confirm-delete-item" data-confirm-delete-id="2">
            <span>Élément 2</span>
            <button class="confirm-delete-btn" onclick="showConfirmDelete(2, 'Élément 2')">Supprimer</button>
        </div>
        
        <div class="confirm-delete-item" data-confirm-delete-id="3">
            <span>Élément 3</span>
            <button class="confirm-delete-btn" onclick="showConfirmDelete(3, 'Élément 3')">Supprimer</button>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div id="confirmDeleteModal" class="confirm-delete-modal">
        <div class="confirm-delete-modal-content">
            <h3>Confirmer la suppression</h3>
            <p id="confirmDeleteMessage">Êtes-vous sûr de vouloir supprimer cet élément ?</p>
            <div class="confirm-delete-modal-buttons">
                <button class="confirm-delete-btn-confirm" onclick="executeConfirmDelete()">Oui, supprimer</button>
                <button class="confirm-delete-btn-cancel" onclick="closeConfirmDeleteModal()">Annuler</button>
            </div>
        </div>
    </div>

    <script>
        let confirmDeleteItemToDelete = null;

        function showConfirmDelete(id, name) {
            confirmDeleteItemToDelete = id;
            const modal = document.getElementById('confirmDeleteModal');
            const message = document.getElementById('confirmDeleteMessage');
            
            message.textContent = `Êtes-vous sûr de vouloir supprimer "${name}" ?`;
            modal.style.display = 'block';
        }

        function executeConfirmDelete() {
            if (confirmDeleteItemToDelete) {
                // Ici vous pouvez ajouter votre logique de suppression
                // Par exemple, appel API, suppression du DOM, etc.
                
                const item = document.querySelector(`[data-confirm-delete-id="${confirmDeleteItemToDelete}"]`);
                if (item) {
                    item.remove();
                    console.log(`Élément ${confirmDeleteItemToDelete} supprimé`);
                }
                
                closeConfirmDeleteModal();
            }
        }

        function closeConfirmDeleteModal() {
            const modal = document.getElementById('confirmDeleteModal');
            modal.style.display = 'none';
            confirmDeleteItemToDelete = null;
        }

        // Fermer le modal en cliquant en dehors
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('confirmDeleteModal');
            if (event.target === modal) {
                closeConfirmDeleteModal();
            }
        });

        // Fermer le modal avec la touche Échap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('confirmDeleteModal');
                if (modal.style.display === 'block') {
                    closeConfirmDeleteModal();
                }
            }
        });
    </script>
</body>
</html>