<template>
    <div>
        <div class="content white-bg mt-30">
            <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                <h4 class="pl-40">Comments ({{ comments.list.length }})</h4>
                <hr>
                <div class="cource-review-box mb-30" v-if="comments.list.length > 0" v-for="(comment,index) in comments.list" :key="index">
                    <img class="avatar avatar-50 photo pull-left mr-5 rounded-circle " alt="" src="https://secure.gravatar.com/avatar/8274ae60d850382eb121ee6460b78b2a?s=50&amp;r=g" srcset="https://secure.gravatar.com/avatar/8274ae60d850382eb121ee6460b78b2a?s=100&amp;r=g 2x" height="40" width="40" loading="lazy" decoding="async">
                    <div class="row">
                        <span>
                            {{ comment.name === 'null' ? comment.user.name : comment.name }}
                        </span>
                        <span class="muted" style="font-size: 12px;">{{ moment(comment.created_at).format("MMM Do YY") }}</span> 
                        <div class="rating">
                            <!-- <span class="total-rating">{{ moment(comment.created_at).format("MMM Do YY") }}</span>  -->
                            <!-- <span class="fa fa-star"></span><span class="fa fa-star"></span>
                            <span class="fa fa-star"></span><span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>&ensp; 256 Reviews -->
                        </div>
                        <div class="text">{{ comment.body }}</div>
                        <!-- <div class="helpful">Was this review helpful?</div> -->
                        <!-- <ul class="like-option">
                            <li><i class="fa fa-thumbs-o-up"></i></li>
                            <li><i class="fa fa-thumbs-o-down"></i></li>
                            <li><a class="report" href="#">Report</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="ontent white-bg mt-30">
            <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                <h4>Leave A Comment</h4>
                <div class="row">
                    <div v-if="!auth.id" class="col-lg-6 mb-35 col-md-12">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Name" required="">
                    </div> 
                    <div v-if="!auth.id" class="col-lg-6 mb-35 col-md-12">
                        <input class="form-control" type="text" id="email" name="email" placeholder="Email" required="">
                    </div> 
                    <div class="col-lg-12 mb-50">
                        <textarea v-model="formData.body" rows="10" class="form-control" id="message" name="body" placeholder=" Message" required=""></textarea>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button @click="postComment" class="btn-part btn readon2 orange-transparent"> Comment </button>
                </div>       
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { inject } from 'vue';
import { ref, toRaw, onMounted, reactive } from 'vue';
    let comments = reactive({
        list: []
    });
    const moment = inject('moment');
    const formData = ref({
        name: '', email: '', body: ''
    });
    const props = defineProps(['auth','post'])

    function getComments(){
        axios.get(`/post/${props.post.id}/comment`)
            .then(response => {
                comments.list = ref(response.data);
                console.log('comments',comments);
            })
    }

    function postComment(){
        const data = toRaw(formData.value);
        axios.post(`/post/${props.post.id}/comment`,data)
            .then(response => {
                console.log('working');
                getComments();
            });
    }

    onMounted(() => {
        getComments();
        console.log('working');
    });
</script>