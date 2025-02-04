<template>
    <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="gridFilter text-center mb-50">
                <button @click="filterCourses(1,0)"
                        :class="active.category === 0 ?'active-btn':''"
                        class="btn" data-filter="*">All ({{ categories.total_courses }}) </button>
                <button @click="filterCourses(1,category.id)"
                        :class="active.category === category.id ?'active-btn':''"
                        class="btn" v-for="category in categories.list"> {{ category.name }} ({{ category.courses_count }}) </button>
            </div>
            <div class="row grid" style="position: relative;">
                <div
                    v-for="(course,index) in courses.list.data"
                    class="col-lg-4 col-md-6 grid-item"
                    >
                    <div class="courses-item mb-30">
                        <div class="img-part">
                            <img src="https://myjavalearningcenter.com/public/assets/images/courses/1.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                <li><span class="price"><i class="fa fa-inr"></i> {{ course.price }} + GST</span></li>
                                <li><a class="categorie" href="#">{{course.category.name}}</a></li>
                            </ul>
                            <h3 class="title"><a :href="'courses/'+course.slug">{{ course.title}}</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i>{{ course.students}}</li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a :href="'courses/'+course.slug"><i
                                        class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Bootstrap5Pagination
                :data="courses.list"
                @pagination-change-page="filterCourses"
            />
        </div>
    </div>

</template>
<script setup>
import axios from 'axios';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { onMounted, ref, computed, reactive } from 'vue';
import { inject } from 'vue';
let courses = reactive({list:[]});
let tags = reactive({list: []});
let active = reactive({category:'',tag:''});
const moment = inject('moment');
const props = defineProps(['categories'])
const payload = reactive({category: 0})
let categories = reactive({list:[], total_courses: 0});

function getCategories() {
    axios.get('/courses/categories').then(response => {
        categories.list = ref(response.data.categories);
        categories.total_courses = ref(response.data.total_courses);
    })
}
function filterCourses(page=1,category)
{
    console.log(category);
    if (category !== undefined) {
        payload.category = category;
    }
    axios.post(`/courses/filter?page=${page}`,payload).then(response => {
        courses.list = ref(response.data);
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

onMounted(() => {
    console.log('mounted');
    getCategories();
    filterCourses();
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
