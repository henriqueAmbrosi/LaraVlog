function flip(type, id) {
  var activeElement = document.getElementById(type + id);
  var nextElementId = type === 'main' ? 'text' : 'main';
  var nextElement = document.getElementById(nextElementId + id);

  activeElement.classList.add('d-none');
  nextElement.classList.remove('d-none');
}
