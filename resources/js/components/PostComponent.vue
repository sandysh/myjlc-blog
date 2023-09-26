<template>
     <div>
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-50 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="gridFilter text-center mb-50">
                    <button @click="filterPosts()" 
                    :class="active.category === 0 ?'active-btn':''" 
                    class="btn" data-filter="*">All </button>
                    <button @click="filterPosts({category:category.id})" 
                    :class="active.category === category.id ?'active-btn':''" 
                    class="btn" v-for="category in categories.list"> {{ category.name }} </button>
                </div>
                <div class="row mb-2">
                    <div class="col-md-8">
                      <div v-for="post in posts.list.data" 
                      class="row g-0 rounded overflow-hidden flex-md-row mb-5 shadow-sm h-md-250 position-relative content white-bg mt-30">
                        <div class="col-10 p-4 d-flex flex-column">
                            <span class="mb-1 text-muted">
                                <img class="avatar avatar-50 photo mr-5 rounded-circle" alt="" src="https://secure.gravatar.com/avatar/8274ae60d850382eb121ee6460b78b2a?s=50&amp;r=g" srcset="https://secure.gravatar.com/avatar/8274ae60d850382eb121ee6460b78b2a?s=100&amp;r=g 2x" height="20" width="20" loading="lazy" decoding="async">
                                <b>{{ post.user.name }}</b>
                                <span class="muted ml-10">| {{ moment(post.created_at).format("MMM Do YY") }}</span>
                            </span>
                          <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                            <h3 class="mb-2">
                                <a :href="'/blog/'+post.slug">{{ post.title }}</a>
                            </h3>
                          <!-- <div class="mb-1 text-muted">Nov 12</div> -->
                          <p class="card-text mb-5" v-html="post.body"></p>
                            <div class="col-12">
                                <div class="row">
                                    <span class="col-2 badge rounded-pill text-bg-dark tags">{{ post.category.name }}</span>
                                    <!-- <span class="col-2 badge rounded-pill text-bg-dark tags">
                                    <i class="fa fa-thumbs-up">12</i>
                                    </span> -->
                                    <span class="col-2 badge rounded-pill text-bg-dark tags">
                                    <i class="fa fa-comments">{{ post.comments_count ?? 0 }}</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-none d-lg-block">
                            <img :src="'/storage/'+post.featured_image" alt="" 
                            style="width: 100%; float: right; vertical-align: middle; margin: 2rem;">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="notice-bord style1">
                            <h4 class="title">Recent Posts</h4>
                            <ul>
                            <li v-for="(recent,index) in recent.list" class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                <div class="date">{{ moment(recent.created_at).format("MMM Do") }}</div>
                                <div class="desc">{{ recent.title }}</div>
                            </li>
                            </ul>
                        </div>
                        
                        <div class="mt-5"></div>
                        <h4>Tags</h4>
                        <span v-for="(tag,index) in tags.list" :key="index" 
                        :class="active.tag === tag ?'active-tag':''" 
                        class="badge primary rounded-pill text-bg-dark tags">
                            <a href="#!" @click="filterPosts({tag:tag})">{{ tag }}</a>
                        </span>
                    </div>

                  </div>
            </div>
        </div>
     </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref, computed, reactive } from 'vue';
import { inject } from 'vue';

let categories = reactive({list:[]});
let posts = reactive({list:[]});
let tags = reactive({list: []});
let recent = reactive({list:[]});
let active = reactive({category:'',tag:''});
const moment = inject('moment');
    function getCategories() {
        axios.get('/categories').then(response => {
            categories.list = ref(response.data);
        })
    }

    function recentPosts()
    {
        axios.get('/posts/recent')
        .then(response => {
            recent.list = ref(response.data);
        })
    }

    function filterPosts(payload)
    {
        axios.post('/posts/filter',payload).then(response => {
            posts.list = ref(response.data);
        })

        if (payload) {
            let keys = Object.keys(payload);
            if (keys.includes('category')){
                active.category = ref(payload.category);
            }
            if (keys.includes('tag')){
                active.tag = ref(payload.tag);
            }
        } else {
            active.category = ref(0);
            active.tag = ref(0);
        }
       
    }

    function getTags() {
        axios.get('/posts/tags')
            .then(response => {
                tags.list = ref(response.data);
            })
    }

    // const postsData = computed(() => {
    //     return posts;
    // });

    onMounted(() => {
            console.log('mounted');
            getCategories();
            filterPosts();
            recentPosts();
            getTags();
        });
</script>

<style>
    .tags {
        color: #242424 !important;
        background-color: #F2F2F2 !important;
        padding: 8px 30px;
        font-size: 14px;
        border: 1px solid rgb(242, 242, 242);
        border-radius: 100px;
        margin-right: 8px;
        margin-bottom: 8px;
    }
    a {
        color: #bd1717;
    }
    
    .active-btn {
        color: #bd1717 !important;
        border: 1px solid #bd1717 !important;
    }

    .active-tag {
        border: 1px solid #bd1717 !important;
    }
    ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
    .notice-bord.style1 .title {
        background: #bd1717;
        font-size: 20px;
        text-transform: uppercase;
        padding: 18px 25px;
        text-align: center;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 10px;
    }
    .notice-bord.style1 li {
        position: relative;
        background: #bd171714;
        margin-bottom: 12px;
        border-radius: 3px;
        padding: 20px;
        padding-left: 0 !important;
        overflow: hidden;
    }
    .notice-bord.style1 li .date {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        color: #bd1717;
        border-right: 1px solid #bd1717;
        padding-right: 10px;
        font-weight: 600;
        width: 60px;
    }
    .notice-bord.style1 li .desc {
        padding-left: 95px;
        font-weight: 500;
    }
    .rs-breadcrumbs .breadcrumbs-img img {
        width: 100%;
        max-height: 150px;
    }
</style>