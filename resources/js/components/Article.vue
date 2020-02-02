<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card  mb-2" v-for="article in articles" :key="article.id">
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
            fetchArticles(){
                fetch('api/articles')
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);

                    this.articles = res.data
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
