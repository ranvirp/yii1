/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

google.load("elements", "1", {packages: "transliteration"});
    

    function OnLoad() {
     
      // Create the HTML for our text area
      
    
      var options = {
          sourceLanguage:
              google.elements.transliteration.LanguageCode.ENGLISH,
          destinationLanguage:
              [google.elements.transliteration.LanguageCode.HINDI],
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true
      };
    
      // Create an instance on TransliterationControl with the required
      // options.
      var control =
          new google.elements.transliteration.TransliterationControl(options);
    
      // Enable transliteration in the textbox with id
      // 'transliterateTextarea'.
      control.makeTransliteratable($('.hindiinput'));


    }
    google.setOnLoadCallback(OnLoad);
