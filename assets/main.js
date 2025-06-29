// Dark/Light mode toggle
const toggle = document.getElementById('darkModeToggle');
if (toggle) {
  toggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    document.getElementById('sunIcon').classList.toggle('hidden');
    document.getElementById('moonIcon').classList.toggle('hidden');
  });
  // On load
  if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
    document.getElementById('sunIcon').classList.remove('hidden');
    document.getElementById('moonIcon').classList.add('hidden');
  }
}
