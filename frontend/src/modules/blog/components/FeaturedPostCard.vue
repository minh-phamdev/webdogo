<template>
    <div class="featured-post bo-rounded shadow" v-if="post">
        <div class="featured-img">
            <img :src="post.image" :alt="post.title" />
        </div>
        <div class="featured-content">
            <span class="badge-tag">NỔI BẬT</span>
            <span class="post-date">📅 {{ post.date }}</span>
            <h2 class="serif featured-title">
                <router-link :to="`/blog/${post.id}`">{{ post.title }}</router-link>
            </h2>
            <p class="excerpt">{{ post.excerpt }}</p>
            <router-link :to="`/blog/${post.id}`" class="read-more">Đọc tiếp bài viết →</router-link>
        </div>
    </div>
</template>

<script setup>
defineProps({ post: Object })
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.shadow {
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.featured-post {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
    margin-bottom: 35px;
}

.featured-img img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.featured-content {
    padding: 24px;
}

.badge-tag {
    background: #a32219;
    color: #fff;
    font-size: 10px;
    padding: 3px 8px;
    border-radius: 4px;
    font-weight: 700;
    margin-right: 10px;
}

.post-date {
    font-size: 12px;
    color: #8c7a6b;
}

.featured-title {
    font-size: 20px;
    margin: 10px 0;
    line-height: 1.4;
}

.featured-title a {
    color: #2c1810;
    text-decoration: none;
}

.excerpt {
    font-size: 13px;
    color: #554438;
    line-height: 1.6;
    margin-bottom: 16px;
}

.read-more {
    color: #c59b27;
    font-weight: 700;
    text-decoration: none;
    font-size: 13px;
}

@media (max-width: 768px) {
    .featured-post {
        grid-template-columns: 1fr;
    }
}
</style>