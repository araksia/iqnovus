//fetch using a Request and a Headers objects
//using jsonplaceholder for the data

const uri = 'https://example.brightidea.com/api3/campaign?page=2&page_size=5';

//new Request(uri)
//new Request(uri, options)
//options - method, headers, body, mode
//methods:  GET, POST, PUT, DELETE, OPTIONS

//new Headers()
// headers.append(name, value)
// Content-Type, Content-Length, Accept, Accept-Language,
// X-Requested-With, User-Agent
let h = new Headers();
h.append('Accept', 'application/json');
h.append('Authorization', 'Bearer 85f7b2462570acdde9a458ba6495b8763dcd040c');
h.append('Access-Control-Allow-Origin', '*');

let req = new Request(uri, {
    method: 'POST',
    headers: h,
    mode: 'cors'
});

fetch(req)
    .then( (response)=>{
        if(response.ok){
            return response.json();
        }else{
            throw new Error('BAD HTTP stuff');
        }
    })
    .then( (jsonData) =>{
        console.log(jsonData);
    })
    .catch( (err) =>{
        console.log('ERROR:', err.message);
    });