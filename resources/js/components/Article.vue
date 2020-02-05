<template>
    <div class="container">
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
                   {{  article.body }}
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
