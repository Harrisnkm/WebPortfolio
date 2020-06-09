/*

Toolkit for formatting Text

 */

//Changes string with all UPPERCASE to Capitalize. Leaves conjunctions as all lowercase.
export default function toLowertoCap(inputText){
    let CapString = [];
    let lowerCase = inputText.toLowerCase();
    let str = lowerCase.split(" ");
    for (let text of str){
        let isConjunction = checkForConjunctions(text);
        if(isConjunction){
            CapString.push(text);
        }else{
            CapString.push(text.charAt(0).toUpperCase() + text.substring(1));
        }
    }
    return CapString.join(" ");
}


function checkForConjunctions(wordToCompare){
    let inputStr = wordToCompare.toLowerCase();
    let conjunctions = ['and'];

    for(let conjunction of conjunctions){
       return (inputStr == conjunction) ? true : false;
    }

}
