(function() {

  tinymce.PluginManager.add( 'cursive_heading_btn', function( editor, url ) {
    var parts = url.split('assets');
    var themeURL = parts[0];
    
    // Add Button to Visual Editor Toolbar
    editor.addButton('cursive_heading', {
      title: 'Cursive Heading',
      cmd: 'cursive_heading',
      image: themeURL + 'images/tinymce/cursive_heading.png',
    });

    // Add Command when Button Clicked
    editor.addCommand('cursive_heading', function() {
        var selected_text = editor.selection.getContent();
        if ( selected_text.length === 0 ) {
            alert( 'Please select some text.' );
            return;
        }
        var open_column = '<h2><span class="cursiveHeading">';
        var close_column = '</span></h2>';
        var return_text = '';
        return_text = open_column + selected_text + close_column;
        editor.execCommand('mceReplaceContent', false, return_text);
        return;
    });
  });

  tinymce.PluginManager.add( 'ctabutton', function( editor, url ) {
      //console.log(url);
      var parts = url.split('assets');
      var themeURL = parts[0];
      
      // Add Button to Visual Editor Toolbar
      editor.addButton('edbutton1', {
          title: 'Custom Button',
          cmd: 'edbutton1',
          image: themeURL + 'images/tinymce/custom-button.png',
      });

      // Add Command when Button Clicked
      editor.addCommand('edbutton1', function() {
        var selected_text = editor.selection.getContent();
        if ( selected_text.length === 0 ) {
            alert( 'Please select some text.' );
            return;
        }
        var open_column = '<span class="custom-button-element"><a data-mce-href="#" href="#"  data-mce-selected="inline-boundary" class="button-element button">';
        var close_column = '</a></span>';
        var return_text = '';
        return_text = open_column + selected_text + close_column;
        editor.execCommand('mceReplaceContent', false, return_text);
        return;
      });
  });

})();