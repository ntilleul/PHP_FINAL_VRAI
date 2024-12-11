document.addEventListener('DOMContentLoaded',function(){
    document.querySelectorAll('.like_btn').forEach(function(btn){
        btn.addEventListener('click',function(){
            let id = this.getAttribute('data-id')
            fetch('?c=toggleLike&id='+id)
            .then(response=>response.text())
            .then(data=>{
                document.querySelector('.like_count[data-id="'+id+'"]').textContent=data
            })
        })
    })

    let search_input = document.getElementById('search_input')
    let search_results = document.getElementById('search_results')
    search_input.addEventListener('input',function(){
        let val=this.value
        if(val.length>0){
            fetch('?c=search&term='+encodeURIComponent(val))
            .then(r=>r.json())
            .then(d=>{
                search_results.innerHTML=''
                d.users.forEach(u=>{
                    let div=document.createElement('div')
                    div.textContent='Utilisateur: '+u.nom
                    search_results.appendChild(div)
                })
                d.posts.forEach(p=>{
                    let div=document.createElement('div')
                    div.textContent='Post: '+p.titre
                    search_results.appendChild(div)
                })
            })
        } else {
            search_results.innerHTML=''
        }
    })

    let toggle_mode = document.getElementById('toggle_mode')
    let body = document.getElementById('body')
    if(localStorage.getItem('mode')==='dark'){
        body.classList.add('dark')
    }
    toggle_mode.addEventListener('click',function(){
        if(body.classList.contains('dark')){
            body.classList.remove('dark')
            localStorage.setItem('mode','light')
        } else {
            body.classList.add('dark')
            localStorage.setItem('mode','dark')
        }
    })
})
