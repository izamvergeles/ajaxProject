/*global fetch*/

let csrf = document.querySelector('meta[name="csrf-token"]').content
let q;
let orderby;
let ordertype;
let order1;


window.addEventListener('load', () => {
    fetchData('fetchData');
});

function fetchData(page) {
    console.log(orderby, ordertype);
    var postData = { q: q, order: order1 };
    fetch(page , {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify(postData),
          })
    .then(function(response) {
        return response.json();
    })
    .then(function(jsonData) {
        // console.log(jsonData);
        showData(jsonData);
    })
    .catch(function(error) {
        console.log(error);
    });
}

function showData(data) {
    let container = document.getElementById('container');
    let paginationDiv = document.getElementById('pagination');
    let url = data.url;
    let products = data.products.data;
    let pagination = data.products.links;
    
    
    //Search
    let search = document.getElementById("search");
    var form = document.getElementById("search");
    function handleForm(event) { event.preventDefault(); } 
    form.addEventListener('submit', handleForm);
    search.addEventListener("submit", (e) => {
        q = document.getElementById("q").value;
        console.log(q);
        var postData = { q: q, order: order1 };
          fetch('fetchData', {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify(postData),
          })
            .then(function(response) {
                return response.json();
            })
            .then(function(jsonData) {
                // console.log(jsonData);
                
                showData(jsonData);
            })
            .catch(function(error) {
                console.log(error);
            });
    });

    //csrf
    // console.log(csrf == data.csrf,csrf, data.csrf);


    let string = '';
    products.forEach(product => {
        let descripcion = product.description.substring(1, 10);
        string += `
            <div class="col-lg-6 col-md-6 item-entry mb-4">
                <a href="${url}/${product.id}" class="product-item md-height bg-gray d-block">
                  <img src="${data.image}/${product.id}.png" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="${url}/${product.id}">${product.name}</a></h2>
                <strong class="item-price">${product.price}</strong>
              </div>`
        ;
    });
    container.innerHTML = string;

    // pagination
    string = '';
    pagination.forEach(pag => {
        if (pag.active) {
            string += `
                <li class="page-item active" aria-current="page">
                    <span class="page-link pulsable" data-url="${pag.url}">${pag.label}</span>
                </li>
            `;
        } else if (pag.url != null) {
            string += `
                <li class="page-item">
                    <span class="btn btn-link pulsable" data-url="${pag.url}" id="${'pag' + pag.label}">${pag.label}</span>
                </li>
            `;
        } else {
            string += `
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">${pag.label}</span>
                </li>
            `;
        }
    });
    paginationDiv.innerHTML = string;

    // Events
    paginationDiv.addEventListener('click', handleClick);
}

function handleClick(e) {
    if (e.target.classList.contains('pulsable')) {
        console.log(e.target.getAttribute('data-url'));
        fetchData(e.target.getAttribute('data-url'));
    }
}

let deafult = document.getElementById("default");
let nAsc = document.getElementById("nAsc");
let nDesc = document.getElementById("nDesc");
let pAsc = document.getElementById("pAsc");
let pDesc = document.getElementById("pDesc");

// deafult.addEventListener('click', function(){
//     order();
// });
// nAsc.addEventListener('click', function(){
//     order("nAsc");
// });
// nDesc.addEventListener('click', function(){
//     order("nDesc");
// });
// pAsc.addEventListener('click', function(){
//     order("pAsc");
// });
// pDesc.addEventListener('click', function(){
//     order("pDesc");
// });

// function order(value){
//     switch (value){
//         case "nAsc":
//             ordertype = "asc";
//             orderby = "product.name";
//         break;
//         case "nDesc":
//             ordertype = "desc";
//             orderby = "product.name";
//         break;
//         case "pAsc":
//             ordertype = "asc";
//             orderby = "product.price";
//         break;
//         case "pDesc":
//             ordertype = "desc";
//             orderby = "product.price";
//         break;
//         default:
//             ordertype = "desc";
//             orderby = "product.updated_at";
//         break;
//     }
//     fetchData('fetchData');
// }

//Arreglando esta chapuza

deafult.addEventListener('click', function(){
    order1 = "";
    fetchData('fetchData');
});
nAsc.addEventListener('click', function(){
    order1 = "t1";
    fetchData('fetchData');
});
nDesc.addEventListener('click', function(){
    order1 = "t2";
    fetchData('fetchData');
});
pAsc.addEventListener('click', function(){
    order1 = "t3";
    fetchData('fetchData');
});
pDesc.addEventListener('click', function(){
    order1 = "t4";
    fetchData('fetchData');
});

