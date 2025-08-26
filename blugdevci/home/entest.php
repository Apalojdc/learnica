<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Pro - Cerfa 13750*05</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .document-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .document-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.15);
        }

        .document-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 1.5rem;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .document-icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            backdrop-filter: blur(10px);
        }

        .document-badge {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .badge-text {
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .document-content {
            padding: 2rem;
        }

        .document-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .document-description {
            color: #718096;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .document-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #a0aec0;
            font-size: 0.85rem;
        }

        .meta-item i {
            color: #667eea;
        }

        .document-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .btn-primary, .btn-secondary {
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f7fafc;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #edf2f7;
            transform: translateY(-1px);
        }

        .comments-toggle {
            background: none;
            border: none;
            color: #667eea;
            font-weight: 600;
            cursor: pointer;
            padding: 1rem;
            width: 100%;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .comments-toggle:hover {
            background: #f7fafc;
            color: #553c9a;
        }

        .comments-section {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
        }

        .comments-section.expanded {
            max-height: 500px;
        }

        .comments-content {
            padding: 1.5rem;
        }

        .comment-form {
            margin-bottom: 1.5rem;
        }

        .comment-input {
            width: 100%;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.9rem;
            resize: vertical;
            min-height: 80px;
            transition: all 0.3s ease;
        }

        .comment-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .comment-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .comment-submit {
            background: #667eea;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-submit:hover {
            background: #553c9a;
            transform: translateY(-1px);
        }

        .emoji-picker {
            display: flex;
            gap: 0.5rem;
        }

        .emoji-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.3rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .emoji-btn:hover {
            background: #e2e8f0;
            transform: scale(1.1);
        }

        .comments-list {
            space: 1rem;
        }

        .comment {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border-left: 3px solid #667eea;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .comment-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .comment-info {
            flex: 1;
        }

        .comment-author {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
        }

        .comment-time {
            color: #a0aec0;
            font-size: 0.75rem;
        }

        .comment-text {
            color: #4a5568;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        .toggle-icon {
            transition: transform 0.3s ease;
        }

        .comments-section.expanded .toggle-icon {
            transform: rotate(180deg);
        }

        @media (max-width: 768px) {
            body { padding: 1rem; }
            .document-card { max-width: 100%; }
            .document-actions { flex-direction: column; }
            .document-meta { flex-direction: column; gap: 0.8rem; }
        }
    </style>
</head>
<body>
    <div class="document-card" data-doc-category="forms">
        <div class="document-header">
            <div class="document-icon form">
                <i class="fas fa-wpforms"></i>
            </div>
            <div class="document-badge">
                <span class="badge-text">PDF</span>
            </div>
        </div>
        
        <div class="document-content">
            <h3 class="document-title">Formulaire Cerfa 13750*05</h3>
            <p class="document-description">Demande de certificat d'immatriculation d'un véhicule neuf ou d'occasion.</p>
            
            <div class="document-meta">
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>Version officielle 2025</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-download"></i>
                    <span>2,156 téléchargements</span>
                </div>
            </div>
            
            <div class="document-actions">
                <button class="btn-primary" onclick="downloadDocument()">
                    <i class="fas fa-download"></i> Télécharger
                </button>
                <button class="btn-secondary" onclick="prefillDocument()">
                    <i class="fas fa-fill-drip"></i> Pré-remplir
                </button>
            </div>
        </div>

        <button class="comments-toggle" onclick="toggleComments()">
            <i class="fas fa-comments"></i>
            <span id="comment-count">3 commentaires</span>
            <i class="fas fa-chevron-down toggle-icon"></i>
        </button>

        <div class="comments-section" id="comments-section">
            <div class="comments-content">
                <div class="comment-form">
                    <textarea class="comment-input" id="comment-input" placeholder="Partagez votre expérience avec ce document..."></textarea>
                    <div class="comment-actions">
                        <div class="emoji-picker">
                            <button class="emoji-btn" onclick="addEmoji('👍')">👍</button>
                            <button class="emoji-btn" onclick="addEmoji('❤️')">❤️</button>
                            <button class="emoji-btn" onclick="addEmoji('🚀')">🚀</button>
                            <button class="emoji-btn" onclick="addEmoji('💡')">💡</button>
                        </div>
                        <button class="comment-submit" onclick="addComment()">
                            <i class="fas fa-paper-plane"></i> Publier
                        </button>
                    </div>
                </div>

                <div class="comments-list" id="comments-list">
                    <!-- Comments will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample comments data
        const comments = [
            {
                id: 1,
                author: "Marie D.",
                avatar: "MD",
                time: "Il y a 2h",
                text: "Très utile pour l'immatriculation de ma nouvelle voiture ! Le formulaire est clair et bien structuré. 👍"
            },
            {
                id: 2,
                author: "Jean P.",
                avatar: "JP",
                time: "Il y a 1j",
                text: "Parfait, j'ai pu remplir le document sans problème. Merci pour cette version officielle !"
            },
            {
                id: 3,
                author: "Sophie L.",
                avatar: "SL",
                time: "Il y a 3j",
                text: "Document conforme aux exigences de la préfecture. Gain de temps énorme ! 🚀"
            }
        ];

        let isCommentsExpanded = false;

        // Initialize comments on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadComments();
        });

        function toggleComments() {
            const section = document.getElementById('comments-section');
            isCommentsExpanded = !isCommentsExpanded;
            
            if (isCommentsExpanded) {
                section.classList.add('expanded');
            } else {
                section.classList.remove('expanded');
            }
        }

        function loadComments() {
            const commentsList = document.getElementById('comments-list');
            commentsList.innerHTML = comments.map(comment => `
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-avatar">${comment.avatar}</div>
                        <div class="comment-info">
                            <div class="comment-author">${comment.author}</div>
                            <div class="comment-time">${comment.time}</div>
                        </div>
                    </div>
                    <div class="comment-text">${comment.text}</div>
                </div>
            `).join('');
        }

        function addComment() {
            const input = document.getElementById('comment-input');
            const text = input.value.trim();
            
            if (!text) {
                alert('Veuillez écrire un commentaire');
                return;
            }

            const newComment = {
                id: comments.length + 1,
                author: "Vous",
                avatar: "VO",
                time: "À l'instant",
                text: text
            };

            comments.unshift(newComment);
            input.value = '';
            loadComments();
            updateCommentCount();
            
            // Success feedback
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Publié !';
            btn.style.background = '#48bb78';
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '#667eea';
            }, 2000);
        }

        function addEmoji(emoji) {
            const input = document.getElementById('comment-input');
            const cursorPos = input.selectionStart;
            const textBefore = input.value.substring(0, cursorPos);
            const textAfter = input.value.substring(cursorPos);
            
            input.value = textBefore + emoji + textAfter;
            input.focus();
            input.setSelectionRange(cursorPos + emoji.length, cursorPos + emoji.length);
        }

        function updateCommentCount() {
            document.getElementById('comment-count').textContent = `${comments.length} commentaires`;
        }

        function downloadDocument() {
            // Download simulation
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Téléchargement...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Téléchargé !';
                btn.style.background = 'linear-gradient(135deg, #48bb78, #38a169)';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = 'linear-gradient(135deg, #667eea, #764ba2)';
                    btn.disabled = false;
                }, 2000);
            }, 1500);
        }

        function prefillDocument() {
            // Prefill simulation
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-magic"></i> Génération...';
            
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Prêt !';
                setTimeout(() => {
                    btn.innerHTML = originalText;
                }, 2000);
            }, 1000);
        }
    </script>
</body>
</html>