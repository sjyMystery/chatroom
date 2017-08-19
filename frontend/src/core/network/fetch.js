import consts from  '../const'
var f = (path, method = 'GET'/*, csrf_token = null*/, data = null,request_url=consts.url) => {

    console.log('fetch',request_url+path);
    return new Promise(function (resolve=()=>{}, reject=()=>{}) {
        var headers = new Headers()
        headers.append('Accept','application/json')
        headers.append('Contant-Type','application/json')
        if (method === 'POST') {
            //headers['X-CSRF-TOKEN']=csrf_token
            if (data != null) {
                data = JSON.stringify(data)
            }
            console.log(headers)
            fetch(request_url + path, {method: 'POST', headers: headers, body: data,mode:"no-cors"})
                .then(response => {
                    if (response.ok === false) {
                        console.log('fetch failed: with status', response.status);
                        reject(response);
                        return
                    }
                    response.json().then(
                        data => resolve(data),
                        error => reject(error)
                    )
                }, err => {
                    console.log('fetch rejected:',err)
                    reject(err)})
                .catch(err => {
                    console.log('fetch exception:', err);
                    reject(err)
                })

        }
        else {
            fetch(request_url + path,{mode: "no-cors",headers:headers})
                .then(response => {
                    if (response.ok === false) {
                        console.log('fetch failed: with status', response.status);
                        reject(response);
                        return
                    }
                    response.json().then(
                        data => resolve(data),
                        error => reject(error)
                    )
                }, err => {
                    console.log('fetch rejected:',err)
                    reject(err)
                })
                .catch(err => {
                    console.log('fetch exception:', err);
                    reject(err)
                })
        }
    })
};

export default f