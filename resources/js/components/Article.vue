<template>
    <div class="container">
        <div v-if="message !=''" class="alert alert-success" role="alert">
            {{ message }}
        </div>
        <div class="col-12">
            <form @submit.prevent="addArticle" class="form mb-3 p-5 border">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Title" v-model="article.title">
                </div>
                <div class="form-group">
                    <textarea  class="form-control" placeholder="Body" v-model="article.body"></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-block">Save </button>
            </form>
        </div>
        <div class="row ">
            <nav aria-label="Page navigation example ">
                <ul class="pagination text-left">
                    <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                        <a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#" >Page {{ pagination.current_page}} of {{ pagination.last_page}} </a>
                    </li>
                    <li class="page-item" :class="[{disabled: !pagination.next_page_url}]">
                        <a class="page-link" href="#"  @click="fetchArticles(pagination.next_page_url)">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="card  mb-2 w-100" v-for="article in articles" :key="article.id">
                <div class="card-header">{{ article.title }}</div>
                <div class="card-body">
                    <p class="card-text">{{  article.body }}</p>
                 <hr>
                    <button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button>
                    <button class="btn btn-info" @click="editArticle(article)">Edit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'myArticle',
        data(){
            return{
                message: '',
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
                },
                article_id: '',
                pagination: {},
                edit: false
            }
        },
        created(){
            this.fetchArticles();
        },
        methods:{
            fetchArticles(page_url){
                //for pagination......
                let vm = this;
                //return json with pagination or just return list of aritcles if no pagination.
                page_url = page_url || '/api/articles';
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);
                    this.articles = res.data;
                    console.log(res.data)
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err))
                //show error if there is any.
                console.log("fetced")
            },
            makePagination(meta, links){
                let pagination ={
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url : links.next,
                    prev_page_url : links.prev
                }

                this.pagination = pagination;
            },
            deleteArticle(id){
                if(confirm('Are you sure?')){
                    fetch(`api/article/${id}`, {
                        method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.message = `Article with has been deleted..`;
                        this.fetchArticles();
                    })
                    .catch(err => console.log(err))
                }
            },
            addArticle(){
                if(this.edit === false){
                    //add
                    fetch('api/article',{
                        method: 'post',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type':'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data =>{
                        this.article.title = ''
                        this.article.body = ''

                        this.message = 'Article has been added'

                        this.fetchArticles();
                    })
                }else{
                    //update
                    fetch('api/article',{
                        method: 'put',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type':'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data =>{
                        this.article.title = ''
                        this.article.body = ''

                        this.message = 'Article has been updated'

                        this.fetchArticles();
                    })
                }
            },
            editArticle(article){
                this.edit = true;
                this.article.id = article.id;
                this.article.article_id = article.id;
                this.article.title = article.title;
                this.article.body = article.body;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
