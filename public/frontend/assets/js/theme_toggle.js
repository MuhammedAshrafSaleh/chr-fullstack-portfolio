// Theme Toggle Functionality
class ThemeToggle {
  constructor() {
    this.themeToggleBtn = document.getElementById('themeToggle');
    this.currentTheme = this.getSavedTheme() || 'dark';
    this.init();
  }

  init() {
    // Set initial theme
    this.setTheme(this.currentTheme);
    
    // Add event listener
    this.themeToggleBtn.addEventListener('click', () => this.toggleTheme());
    
    // Add keyboard support
    this.themeToggleBtn.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.toggleTheme();
      }
    });
  }

  toggleTheme() {
    this.currentTheme = this.currentTheme === 'dark' ? 'light' : 'dark';
    this.setTheme(this.currentTheme);
    this.saveTheme(this.currentTheme);
  }

  setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    this.updateAriaLabel(theme);
  }

  updateAriaLabel(theme) {
    const label = theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode';
    this.themeToggleBtn.setAttribute('aria-label', label);
  }

  saveTheme(theme) {
    try {
      localStorage.setItem('theme', theme);
    } catch (e) {
      console.warn('Could not save theme preference:', e);
    }
  }

  getSavedTheme() {
    try {
      return localStorage.getItem('theme');
    } catch (e) {
      console.warn('Could not retrieve theme preference:', e);
      return null;
    }
  }
}

// Initialize theme toggle when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    new ThemeToggle();
  });
} else {
  new ThemeToggle();
}