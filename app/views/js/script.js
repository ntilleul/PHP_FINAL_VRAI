document.addEventListener('DOMContentLoaded',function(){
    document.querySelectorAll('.reaction_btn').forEach(function(btn){
        btn.addEventListener('click',function(){
            let id = this.getAttribute('data-id')
            let type = this.getAttribute('data-type')
            fetch('?c=toggleReaction&id='+id+'&type='+type)
            .then(response=>response.json())
            .then(data=>{
                let container = document.querySelector('.reaction_count_container[data-id="'+id+'"]')
                if(container){
                    container.innerHTML = ''
                    data.forEach(r=>{
                        let span = document.createElement('span')
                        span.classList.add('reaction_count')
                        span.textContent = r.c+' '
                        if(r.reaction_type=='like') span.textContent += '👍'
                        else if(r.reaction_type=='love') span.textContent += '❤️'
                        else if(r.reaction_type=='funny') span.textContent += '😂'
                        container.appendChild(span)
                        container.appendChild(document.createTextNode(' '))
                    })
                }
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
                    let a=document.createElement('a')
                    a.href='?c=profilView&id='+u.id
                    a.textContent='Utilisateur: '+u.nom+' ('+u.email+')'
                    a.classList.add('d-block','p-2','text-decoration-none','text-dark')
                    search_results.appendChild(a)
                })

                d.posts.forEach(p=>{
                    let a=document.createElement('a')
                    a.href='?c=detail&id='+p.id
                    a.textContent='Post: '+p.titre
                    a.classList.add('d-block','p-2','text-decoration-none','text-dark')
                    search_results.appendChild(a)
                })

                d.comments.forEach(c=>{
                    let a=document.createElement('a')
                    a.href='?c=detail&id='+c.post_id+'#comment_'+c.id
                    a.textContent='Commentaire sur "'+c.post_titre+'" : '+c.contenu
                    a.classList.add('d-block','p-2','text-decoration-none','text-dark')
                    search_results.appendChild(a)
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
