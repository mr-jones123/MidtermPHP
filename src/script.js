
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
function showSideBar() {
    const sidebar = document.getElementById('Sidenav');
    sidebar.style.width = '250px'; // Expand the sidebar width to show it
}

function hideSideBar() {
    const sidebar = document.getElementById('Sidenav');
    sidebar.style.width = '0'; // Collapse the sidebar width to hide it
}


function openForm() {
  document.getElementById("admin").style.display = "block";
}

function closeForm() {
  document.getElementById("admin").style.display = "none";
}

