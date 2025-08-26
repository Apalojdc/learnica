<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Learnica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ==========================================================================
   CSS VARIABLES ET BASE
   ========================================================================== */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

:root {
    /* Gradients */
    --primary-gradient: linear-gradient(135deg, #01041180 0%, #04c8e280 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    --btn-voir-plus-gradient: linear-gradient(135deg, #08474710 0%, #115f024d 100%);
    
    /* Colors */
    --dark-bg: #0f0f23;
    --dark-secondary: #1a1a35;
    --dark-tertiary: #252547;
    --dark-card: #2a2a4a;
    
    --text-primary: #ffffff;
    --text-secondary: #e2e8f0;
    --text-muted: #94a3b8;
    --text-accent: #667eea;
    
    --border-primary: rgba(255, 255, 255, 0.1);
    --border-secondary: rgba(255, 255, 255, 0.05);
    --surface-primary: rgba(255, 255, 255, 0.05);
    --surface-secondary: rgba(255, 255, 255, 0.02);
    
    /* Shadows */
    --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
    --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.2);
    --shadow-xl: 0 15px 35px rgba(0, 0, 0, 0.25);
    
    /* Border Radius */
    --border-radius: 16px;
    --border-radius-sm: 8px;
    --border-radius-lg: 24px;
    
    /* Transitions */
    --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-normal: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Layout */
    --sidebar-width: 320px;
    --sidebar-collapsed-width: 80px;
    --container-max-width: 1200px;
    --grid-gap: clamp(1rem, 3vw, 2rem);
}

/* ==========================================================================
   RESET ET BASE
   ========================================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: var(--dark-bg);
    color: var(--text-primary);
    overflow-x: hidden;
    line-height: 1.6;
}

/* Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--dark-secondary);
}

::-webkit-scrollbar-thumb {
    background: var(--primary-gradient);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--accent-gradient);
}

/* ==========================================================================
   LAYOUT PRINCIPAL
   ========================================================================== */

.dashboard-container {
    display: flex;
    min-height: 100vh;
    position: relative;
}

/* ==========================================================================
   SIDEBAR
   ========================================================================== */

.sidebar {
    width: var(--sidebar-width);
    background: var(--dark-secondary);
    position: fixed;
    height: 100vh;
    z-index: 99999;
    overflow-y: auto;
    transition: all var(--transition-normal);
    border-right: 1px solid var(--border-primary);
    backdrop-filter: blur(20px);
}

.sidebar.collapsed {
    width: var(--sidebar-collapsed-width);
}

.sidebar-header {
    padding: 24px;
    border-bottom: 1px solid var(--border-primary);
    position: relative;
}

.sidebar-toggle {
    position: absolute;
    top: 24px;
    right: 5px;
    width: 36px;
    height: 36px;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-sm);
    color: var(--text-secondary);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--transition-normal);
    z-index: 1001;
}

.sidebar-toggle:hover {
    background: var(--surface-secondary);
    color: var(--text-accent);
    transform: scale(1.05);
}

.logo {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary);
    transition: all var(--transition-normal);
}

.logo-icon {
    width: 48px;
    height: 48px;
    background: var(--accent-gradient);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
    color: white;
}

.logo-text {
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    white-space: nowrap;
    transition: all var(--transition-normal);
}

.sidebar.collapsed .logo-text {
    opacity: 0;
    transform: translateX(-20px);
}

/* Admin Info */
.admin-info {
    margin-top: 24px;
    padding: 20px;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-primary);
    transition: all var(--transition-normal);
}

.sidebar.collapsed .admin-info {
    opacity: 0;
    transform: scale(0.9);
    pointer-events: none;
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.admin-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--text-primary);
    box-shadow: var(--shadow-sm);
    flex-shrink: 0;
}

/* Navigation */
.sidebar-nav {
    padding: 24px 0;
}

.nav-section {
    margin-bottom: 32px;
}

.nav-section-title {
    padding: 0 24px 12px;
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all var(--transition-normal);
}

.sidebar.collapsed .nav-section-title {
    opacity: 0;
    transform: translateX(-20px);
}

.nav-item {
    margin: 4px 16px;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 14px 16px;
    color: var(--text-secondary);
    text-decoration: none;
    border-radius: var(--border-radius);
    transition: all var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.nav-link:hover {
    background: var(--surface-primary);
    color: var(--text-primary);
    transform: translateX(8px);
}

.nav-link.active {
    background: rgba(102, 126, 234, 0.1);
    color: var(--text-accent);
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.nav-icon {
    font-size: 1.2rem;
    width: 24px;
    text-align: center;
    flex-shrink: 0;
    transition: all var(--transition-normal);
}

.nav-text {
    font-weight: 500;
    white-space: nowrap;
    transition: all var(--transition-normal);
}

.sidebar.collapsed .nav-text {
    opacity: 0;
    transform: translateX(-20px);
}

/* Mobile Menu */
.mobile-menu-btn {
    display: none;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 2001;
    width: 44px;
    height: 44px;
    background: var(--primary-gradient);
    border: none;
    border-radius: var(--border-radius);
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    box-shadow: var(--shadow-lg);
    transition: all var(--transition-normal);
}

.mobile-menu-btn:hover {
    transform: scale(1.05);
}

.mobile-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1999;
    opacity: 0;
    visibility: hidden;
    transition: all var(--transition-normal);
}

.mobile-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* ==========================================================================
   MAIN CONTENT
   ========================================================================== */

.main-content {
    flex: 1;
    margin-left: var(--sidebar-width);
    transition: margin-left var(--transition-normal);
    background: var(--dark-bg);
}

.sidebar.collapsed + .main-content {
    margin-left: var(--sidebar-collapsed-width);
}

/* Header */
.dashboard-header {
    background: var(--dark-secondary);
    padding: 24px 32px;
    border-bottom: 1px solid var(--border-primary);
    backdrop-filter: blur(20px);
    position: sticky;
    top: 0;
    z-index: 100;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: var(--container-max-width);
    margin: 0 auto;
}

.header-left h1 {
    font-size: 2rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 8px;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-search {
    position: relative;
    width: 300px;
}

.header-search input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 3rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 50px;
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.header-search input:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--surface-secondary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

.header-search .search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 1rem;
}

.header-notifications {
    position: relative;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 50%;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-normal);
}

.header-notifications:hover {
    background: var(--surface-secondary);
    color: var(--text-accent);
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ef4444;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.content-wrapper {
    padding: 32px;
    max-width: var(--container-max-width);
    margin: 0 auto;
}

/* ==========================================================================
   DASHBOARD CARDS
   ========================================================================== */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: var(--dark-secondary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius-lg);
    padding: 2rem;
    position: relative;
    overflow: hidden;
    transition: all var(--transition-normal);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: var(--text-accent);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--accent-gradient);
}

.stat-card.documents::before {
    background: var(--primary-gradient);
}

.stat-card.users::before {
    background: var(--success-gradient);
}

.stat-card.articles::before {
    background: var(--secondary-gradient);
}

.stat-card.revenue::before {
    background: var(--warning-gradient);
}

.stat-header {
    display: flex;
    justify-content: between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin-bottom: 1rem;
}

.stat-card.documents .stat-icon {
    background: var(--primary-gradient);
}

.stat-card.users .stat-icon {
    background: var(--success-gradient);
}

.stat-card.articles .stat-icon {
    background: var(--secondary-gradient);
}

.stat-card.revenue .stat-icon {
    background: var(--warning-gradient);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    display: block;
}

.stat-label {
    color: var(--text-muted);
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 1rem;
}

.stat-change {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    font-weight: 600;
}

.stat-change.positive {
    color: #10b981;
}

.stat-change.negative {
    color: #ef4444;
}

/* ==========================================================================
   Popop ajouter une categorie
   ========================================================================== */
/* Conteneur du popup */
#cat-popup-container {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;
  justify-content: center;
  align-items: center;
}

/* Boîte du formulaire */
#cat-popup-box {
  background-color: #fff;
  padding: 20px;
  width: 90%;
  max-width: 400px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0,0,0,0.3);
}

#cat-popup-box h2 {
  margin-top: 0;
  font-size: 1.5rem;
  text-align: center;
  color: red;
}

#cat-popup-box label {
  display: block;
  margin-top: 15px;
  font-weight: bold;
  color:var(--dark-bg);
}

#cat-popup-box input,
#cat-popup-box textarea {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.cat-popup-actions {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}

.cat-popup-actions button {
  padding: 8px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.cat-popup-actions button[type="submit"] {
  background-color: #007bff;
  color: white;
}

.cat-popup-actions #btn-close-cat-popup {
  background-color: #aaa;
  color: white;
}


/* ==========================================================================
   CONTENT SECTIONS
   ========================================================================== */

.content-section {
    display: none;
    background: var(--dark-secondary);
    border-radius: var(--border-radius-lg);
    border: 1px solid var(--border-primary);
    margin-bottom: 2rem;
    overflow: hidden;
}

.content-section.active {
    display: block;
    animation: fadeInUp 0.6s ease-out;
}



@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.section-header {
    background: var(--surface-primary);
    padding: 2rem;
    border-bottom: 1px solid var(--border-primary);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.section-title i {
    color: var(--text-accent);
}

.section-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: var(--border-radius);
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    border: none;
}

.btn-primary {
    background: var(--primary-gradient);
    color: white;
}

.btn-primary:hover {
    background: var(--accent-gradient);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-success {
    background: var(--success-gradient);
    color: white;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-danger {
    background: var(--danger-gradient);
    color: white;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-secondary {
    background: transparent;
    color: var(--text-secondary);
    border: 2px solid var(--border-primary);
}

.btn-secondary:hover {
    background: var(--surface-primary);
    color: var(--text-accent);
    border-color: var(--text-accent);
}

.search-filter-bar {
    padding: 1.5rem 2rem;
    background: var(--surface-secondary);
    border-bottom: 1px solid var(--border-primary);
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.search-input {
    flex: 1;
    min-width: 200px;
    padding: 0.75rem 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.search-input:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--dark-card);
}

.filter-select {
    padding: 0.75rem 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 0.9rem;
    cursor: pointer;
}

/* ==========================================================================
   TABLES
   ========================================================================== */

.data-table-container {
    padding: 2rem;
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    background: var(--dark-card);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.data-table thead {
    background: var(--surface-primary);
}

.data-table th,
.data-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--border-secondary);
}

.data-table th {
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.data-table td {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.data-table tr:hover {
    background: var(--surface-secondary);
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-active {
    background: rgba(16, 185, 129, 0.2);
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.3);
}

.status-inactive {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
}

.status-pending {
    background: rgba(251, 191, 36, 0.2);
    color: #fbbf24;
    border: 1px solid rgba(251, 191, 36, 0.3);
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-sm {
    padding: 0.5rem 0.75rem;
    font-size: 0.8rem;
    border-radius: var(--border-radius-sm);
}

/* ==========================================================================
   FORMS
   ========================================================================== */

.form-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 2000;
    display: none;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(5px);
}

.form-modal.active {
    display: flex;
}

.modal-content {
    background: var(--dark-secondary);
    border-radius: var(--border-radius-lg);
    border: 1px solid var(--border-primary);
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-xl);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(-20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.modal-header {
    padding: 2rem;
    border-bottom: 1px solid var(--border-primary);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-primary);
}

.modal-close {
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--text-muted);
    transition: all var(--transition-normal);
}

.modal-close:hover {
    background: var(--surface-secondary);
    color: var(--text-accent);
}

.modal-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.9rem;
}

.form-input,
.form-textarea,
.form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    background: var(--surface-primary);
    border: 1px solid var(--border-primary);
    border-radius: var(--border-radius);
    color: var(--text-primary);
    font-size: 0.9rem;
    transition: all var(--transition-normal);
}

.form-input:focus,
.form-textarea:focus,
.form-select:focus {
    outline: none;
    border-color: var(--text-accent);
    background: var(--dark-card);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

.form-textarea {
    min-height: 100px;
    resize: vertical;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.modal-footer {
    padding: 2rem;
    border-top: 1px solid var(--border-primary);
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
}

/* ==========================================================================
   FAB BUTTON
   ========================================================================== */

.fab-button {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 60px;
    height: 60px;
    background: var(--accent-gradient);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    box-shadow: var(--shadow-xl);
    transition: all var(--transition-normal);
    z-index: 1500;
    display: flex;
    align-items: center;
    justify-content: center;
}

.fab-button:hover {
    transform: scale(1.1) rotate(45deg);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

/* ==========================================================================
   CHARTS PLACEHOLDER
   ========================================================================== */

.chart-container {
    background: var(--dark-card);
    border-radius: var(--border-radius);
    padding: 2rem;
    margin-bottom: 2rem;
    border: 1px solid var(--border-primary);
}

.chart-placeholder {
    height: 300px;
    background: var(--surface-primary);
    border-radius: var(--border-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 1.1rem;
    font-weight: 600;
}

/* ==========================================================================
   RESPONSIVE
   ========================================================================== */

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        z-index: 2000;
        width: 85vw;
        max-width: 320px;
    }
    
    .sidebar.mobile-open {
        transform: translateX(0);
    }
    
    .main-content {
        margin-left: 0;
        width: 100%;
    }
    
    .sidebar.collapsed + .main-content {
        margin-left: 0;
    }
    
    .mobile-menu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .content-wrapper {
        padding: 1rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .header-search {
        width: 200px;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .search-filter-bar {
        flex-direction: column;
        align-items: stretch;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .modal-content {
        width: 95%;
        margin: 1rem;
    }
    
    .fab-button {
        bottom: 1rem;
        right: 1rem;
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100vw;
    }
    
    .data-table-container {
        padding: 1rem;
    }
    
    .data-table th,
    .data-table td {
        padding: 0.5rem;
        font-size: 0.8rem;
    }
    
    .modal-header,
    .modal-body,
    .modal-footer {
        padding: 1rem;
    }
}

/* Fond semi-transparent */
.suppression-popup-overlay {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background-color: rgba(0, 0, 0, 0.6);
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

/* Boîte du popup */
.suppression-popup-box {
  background: #fff;
  padding: 20px;
  width: 300px;
  border-radius: 8px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}
.suppression-popup-box {
 color:red;
 box-shadow:bold;
}

/* Boutons du popup */
#btn-annuler-suppression,
#btn-confirmer-suppression {
  padding: 8px 16px;
  margin: 10px 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#btn-annuler-suppression {
  background-color: #777;
  color: #fff;
}

#btn-confirmer-suppression {
  background-color: #e53935;
  color: #fff;
}

/* Fond du popup */
.modification-popup-overlay {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 9998;
}

/* Boîte du popup */
.modification-popup-box {
  background: #fff;
  padding: 20px;
  width: 300px;
  border-radius: 8px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}
.modification-popup-box p{
  color:blue;
  box-shadow:bold;
}

/* Boutons */
#btn-annuler-modification,
#btn-confirmer-modification {
  padding: 8px 16px;
  margin: 10px 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#btn-annuler-modification {
  background-color: #777;
  color: #fff;
}

#btn-confirmer-modification {
  background-color: #007bff;
  color: #fff;
}

    </style>
</head>
<body>
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" onclick="toggleMobileMenu()"></div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span class="logo-text">Learnica</span>
                </div>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <!-- Admin Info -->
            <div class="admin-info">
                <div class="admin-profile">
                    <div class="admin-avatar">A</div>
                    <div>
                        <div style="font-weight: 600; color: var(--text-primary);">Admin</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">Administrateur</div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Vue d'ensemble</div>
                    <div class="nav-item">
                        <a href="#" class="nav-link active" onclick="showSection('dashboard', this)">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <span class="nav-text">Tableau de bord</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('analytics', this)">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <span class="nav-text">Analyses</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Contenu</div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('documents', this)">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <span class="nav-text">Documents</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('articles', this)">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <span class="nav-text">Articles</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('categories', this)">
                            <i class="nav-icon fas fa-tags"></i>
                            <span class="nav-text">Catégories</span>
                        </a>
                    </div>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Communauté</div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('users', this)">
                            <i class="nav-icon fas fa-users"></i>
                            <span class="nav-text">Utilisateurs</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('forums', this)">
                            <i class="nav-icon fas fa-comments"></i>
                            <span class="nav-text">Forums</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('comments', this)">
                            <i class="nav-icon fas fa-comment-dots"></i>
                            <span class="nav-text">Commentaires</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link" onclick="showSection('messages', this)">
                            <i class="nav-icon fas fa-envelope"></i>
                            <span class="nav-text">Messages</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            
            <!-- Content Wrapper -->
            <div class="content-wrapper">
               
                <!-- Dashboard Section -->
                <section id="dashboard" class="content-section active">
                   <?php include(__DIR__.'/admin_dashboard/index.php') ?>
                    <!-- Recent Activity -->
                    <div class="content-section active">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-history"></i>
                                Activité récente
                            </h2>
                        </div>
                        <div class="data-table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Utilisateur</th>
                                        <th>Détails</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>25/07/2025 14:30</td>
                                        <td>Nouveau document</td>
                                        <td>Jean Dupont</td>
                                        <td>Cours de mathématiques ajouté</td>
                                        <td><span class="status-badge status-active">Approuvé</span></td>
                                    </tr>
                                    <tr>
                                        <td>25/07/2025 13:15</td>
                                        <td>Inscription</td>
                                        <td>Marie Martin</td>
                                        <td>Nouvel utilisateur inscrit</td>
                                        <td><span class="status-badge status-active">Actif</span></td>
                                    </tr>
                                    <tr>
                                        <td>25/07/2025 12:00</td>
                                        <td>Commentaire</td>
                                        <td>Paul Bernard</td>
                                        <td>Commentaire sur "Guide Python"</td>
                                        <td><span class="status-badge status-pending">En attente</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Documents Section -->
                <section id="documents" class="content-section">
                   <?php include(__DIR__.'/documentadmin/show.php') ?>
                </section>

                <!-- Articles Section -->
                <section id="articles" class="content-section">
                    <?php include(__DIR__.'/adminarticle/show.php') ?>
                </section>

                 <!-- Categories Section -->
                <section id="categories" class="content-section">
                    <?php include(__DIR__.'/categories/show.php') ?>
                    <p>Paragraphe</p>
                </section>

                <!-- Users Section -->
                <section id="users" class="content-section">
                     <?php include(__DIR__.'/usersadmin/show.php') ?>
                </section>

               
                <!-- Forums Section -->
                <section id="forums" class="content-section">
                    <?php include(__DIR__.'/forums/show.php') ?>
                </section>

                <!-- Comments Section -->
                <section id="comments" class="content-section">
                    <?php include(__DIR__.'/commentaires/show.php') ?>
                </section>

                <!-- Messages Section -->
                <section id="messages" class="content-section">
                    <?php include(__DIR__.'/message/index.php') ?>
                </section>

                <!-- Analytics Section -->
                <section id="analytics" class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">
                            <i class="fas fa-chart-pie"></i>
                            Analyses et Statistiques
                        </h2>
                    </div>

                    <div class="chart-container">
                        <h3 style="color: var(--text-primary); margin-bottom: 1rem;">
                            <i class="fas fa-download" style="color: var(--text-accent); margin-right: 0.5rem;"></i>
                            Téléchargements par catégorie
                        </h3>
                        <div class="chart-placeholder">
                            Graphique en secteurs des téléchargements
                        </div>
                    </div>

                    <div class="chart-container">
                        <h3 style="color: var(--text-primary); margin-bottom: 1rem;">
                            <i class="fas fa-users" style="color: var(--text-accent); margin-right: 0.5rem;"></i>
                            Évolution des inscriptions
                        </h3>
                        <div class="chart-placeholder">
                            Graphique linéaire des inscriptions
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- FAB Button -->
    <button class="fab-button" onclick="openQuickAdd()">
        <i class="fas fa-plus"></i>
    </button>

    <!-- Document Modal -->
    <div id="document-modal" class="form-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ajouter un document</h3>
                <button class="modal-close" onclick="closeModal('document-modal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Titre</label>
                        <input type="text" class="form-input" placeholder="Titre du document">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catégorie</label>
                        <select class="form-select">
                            <option>Mathématiques</option>
                            <option>Sciences</option>
                            <option>Histoire</option>
                            <option>Langues</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" placeholder="Description du document"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Prix (€)</label>
                        <input type="number" class="form-input" placeholder="0.00" step="0.01">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type</label>
                        <select class="form-select">
                            <option>Gratuit</option>
                            <option>Payant</option>
                            <option>Premium</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Fichier</label>
                    <input type="file" class="form-input">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('document-modal')">Annuler</button>
                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
    <!-- Article Modal -->
    <!-- <div id="article-modal" class="form-modal">
        <div class="modal-header">
            <h3 class="modal-title">Ajouter un article</h3>
            <button class="modal-close" onclick="closeModal('article-modal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div> -->
    <!-- Forum Modal -->
    <!-- <div id="forum-modal" class="form-modal">
        <div class="modal-header">
            <h3 class="modal-title">Ajouter un forum</h3>
            <button class="modal-close" onclick="closeModal('forum-modal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div> -->

    <script>
        // Navigation
        function showSection(sectionId, linkElement) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).classList.add('active');

            // Update navigation
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            linkElement.classList.add('active');

            // Close mobile menu if open
            if (window.innerWidth <= 768) {
                toggleMobileMenu();
            }
        }

        // Sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleIcon = document.querySelector('.sidebar-toggle i');
            
            sidebar.classList.toggle('collapsed');
            
            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('fa-chevron-left');
                toggleIcon.classList.add('fa-chevron-right');
            } else {
                toggleIcon.classList.remove('fa-chevron-right');
                toggleIcon.classList.add('fa-chevron-left');
            }
        }

        // Mobile menu
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.mobile-overlay');
            
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('active');
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Quick add function for FAB button
        function openQuickAdd() {
            // Get currently active section to determine what to add
            const activeSection = document.querySelector('.content-section.active');
            const sectionId = activeSection.id;
            
            switch(sectionId) {
                case 'documents':
                    openModal('document-modal');
                    break;
                case 'articles':
                    openModal('article-modal');
                    break;
                case 'users':
                    openModal('user-modal');
                    break;
                case 'categories':
                    openModal('category-modal');
                    break;
                case 'forums':
                    openModal('forum-modal');
                    break;
                default:
                    openModal('document-modal');
            }
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            if (e.target.classList.contains('form-modal')) {
                e.target.classList.remove('active');
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to stat cards
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.6s ease-out';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });

        // Fonction pour ajouter une catégorie
        (function(){
            const openBtn = document.getElementById('btn-open-cat-popup');
            const closeBtn = document.getElementById('btn-close-cat-popup');
            const popup = document.getElementById('cat-popup-container');

            openBtn.onclick = () => popup.style.display = 'flex';
            closeBtn.onclick = () => popup.style.display = 'none';

            // Fermer le popup si on clique en dehors de la boîte
            popup.addEventListener('click', function(e) {
                if (e.target === popup) popup.style.display = 'none';
            });
        })();

        (function(){
            // Récupérer les données PHP dans JS
            let labels = <?php echo json_encode($mois); ?>;
            let valeurs = <?php echo json_encode($total); ?>;

            new Chart(document.getElementById('graphMessages'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de messages',
                        data: valeurs,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                }
            });
        })();

        (function(){
            // Récupérer les données PHP dans JS
            let labels = <?php echo json_encode($mois_doc); ?>;
            let valeurs = <?php echo json_encode($total_doc); ?>;

            new Chart(document.getElementById('graphDocuments'), {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de documents',
                        data: valeurs,
                        backgroundColor: 'rgba(177, 89, 7, 0.6)'
                    }]
                }
            });
        })();
    </script>
</body>
</html>