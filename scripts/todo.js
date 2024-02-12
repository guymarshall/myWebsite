function addTodo() {
    let list = document.getElementById('todoList');
    let todo = document.getElementById('todo').value;
    let entry = document.createElement('li');
    entry.appendChild(document.createTextNode(todo));
    list.appendChild(entry);

    let removeButton = document.createElement('input');
    removeButton.setAttribute('type', 'button');
    removeButton.setAttribute("value", "Remove");
    removeButton.setAttribute("id", "removeButton");
    removeButton.addEventListener('click', function(e) {
      entry.parentNode.removeChild(entry);
    }, false);
    entry.appendChild(removeButton);

    document.getElementById('todo').value = '';
  }

  function clearTodos() {
    document.getElementById('todoList').innerHTML = '';
    document.getElementById('todo').value = '';
  }
