// let count = (num) => {
//     if (num == 0) return;
//     console.log(num );
//     count(num - 1);
    
// }
// count(10)

// let categories = [
//     {id: 'animals', 'parent': null},
//     {id: 'animals', 'parent': 'animal'},
//     {id: 'cats', 'parent': 'mammal'},
//     {id: 'dogs', 'parent': 'mammal'},
//     {id: 'chihuds', 'parent': 'dogs'},
//     {id: 'labrodors', 'parent': 'dogs'}
// ]
// let maketrees = (categories,parent) => {
//     let node = {}
//    categories.filter(c => c.parent === parent)
//    .forEach(c => node[c.id] = maketrees(categories,c.id));
//    return node;
// }
// console.log ( JSON.stringify(
//     maketrees(categories,null),null,2));

function factorial(num){
    debugger;
    return num <= 0 ? 1 : num * factorial(num - 1);
}
console.log(factorial(5));
// mac
function mac_sers(value,terms){
    if(terms <= 0 ){
        return;
    } if(terms == 1 ){
        return 1 ;
    }else{
        let sum = 1;
        for (let i = 1; i < terms; i++ ){
            sum += Math.pow(value,i) / factorial(i);
            var next = Math.pow(value,i)-1;
            var prev = factorial( i);
            // console.log(next);
            // console.log(prev);
            console.log( "i is " + i);
            sum += next/ prev;
        }
        return sum;
    }
}
console.log ( mac_sers(1,2,6));
