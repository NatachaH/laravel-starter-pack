/*
|--------------------------------------------------------------------------
| Listing
|--------------------------------------------------------------------------
*/

(function() {

  window.TableTreeView = function(el) {

    // Variables
    this.table = el;
    this.rows = this.table.querySelectorAll('tbody tr');

    this.init();


  };

  // Init
  TableTreeView.prototype.init = function()
  {
      var treeObject = this;

      Array.prototype.forEach.call(treeObject.rows, function(el, i) {

        // Check if have toggle
        var toggle = el.querySelector('.toggle-children');

        if(toggle) {

          toggle.addEventListener('click',function(e){

              // Get the row
              var row = this.closest('tr');

              // Toggle the icon
              treeObject.toggleIcon(toggle);

              // Open or close children
              if(row.classList.contains('expand'))
              {
                treeObject.contract(row);
              } else {
                treeObject.expand(row);
              }

          },false);

        }

      });


  }

  // toggle the icon class
  TableTreeView.prototype.toggleIcon = function(td)
  {
      // Get the icon
      var icon = td.querySelector(' i');

      if(icon !== null)
      {
          // Toggle the classes
          icon.classList.toggle('icon-chevron-right');
          icon.classList.toggle('icon-chevron-down');
      }
  }

  // expand
  TableTreeView.prototype.expand = function(row)
  {
      // Get the children by parent id
      var children = this.table.querySelectorAll('tr[data-parent="'+(row.getAttribute('data-id'))+'"]');

      // Add the class to the row
      row.classList.add('expand');

      // Open each children
      children.forEach(function(child, index) {
        child.classList.add('show');
      });
  }

  // contract
  TableTreeView.prototype.contract = function(row)
  {
      var treeObject = this;

      // Get the children by parent id
      var children = this.table.querySelectorAll('tr[data-parent="'+(row.getAttribute('data-id'))+'"]');

      // Remove the class to the row
      row.classList.remove('expand');

      // Close each children
      children.forEach(function(child, index) {
        child.classList.remove('show');
        treeObject.contract(child);
      });
  }

}());


// Init the TableTreeView to each .table-tree
var tree = document.querySelectorAll('.table-tree');
if(tree)
{
  Array.prototype.forEach.call(tree, function(el, i) {
      var myTree = new TableTreeView(el);
  });
}