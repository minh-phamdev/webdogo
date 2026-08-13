<template>
    <article class="post-card bo-rounded">
        <div class="card-img">
            <img :src="post.image" :alt="post.title" />
            <span class="category-tag">{{ post.categoryName }}</span>
        </div>
        <div class="card-body">
            <span class="post-date">📅 {{ post.date }}</span>
            <h3 class="post-title serif">
                <router-link :to="`/blog/${post.id}`">{{ post.title }}</router-link>
            </h3>
            <p class="post-desc">{{ post.excerpt }}</p>

            <div class="card-footer">
                <router-link :to="`/blog/${post.id}`" class="read-link">Đọc chi tiết →</router-link>
            </div>
        </div>
    </article>
</template>

<script setup>
defineProps({
    post: { type: Object, required: true }
})
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.post-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.post-card:hover {
    transform: translateY(-4px);
    border-color: #c59b27;
    box-shadow: 0 10px 20px rgba(44, 24, 16, 0.08);
}

.card-img {
    position: relative;
    height: 190px;
    overflow: hidden;
    background: #fbf9f6;
}

.card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.post-card:hover .card-img img {
    transform: scale(1.05);
}

.category-tag {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(44, 24, 16, 0.9);
    color: #e6c675;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
}

.card-body {
    padding: 16px;
}

.post-date {
    font-size: 12px;
    color: #8c7a6b;
    display: block;
    margin-bottom: 6px;
}

.post-title {
    font-size: 15px;
    margin: 0 0 8px 0;
    font-weight: 700;
    line-height: 1.4;
    height: 42px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.post-title a {
    color: #2c1810;
    text-decoration: none;
    transition: color 0.2s;
}

.post-title a:hover {
    color: #c59b27;
}

.post-desc {
    font-size: 13px;
    color: #66554a;
    line-height: 1.5;
    margin-bottom: 14px;
    height: 58px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-footer {
    border-top: 1px solid #f2eae0;
    padding-top: 10px;
    text-align: right;
}

.read-link {
    font-size: 12px;
    color: #a32219;
    font-weight: 700;
    text-decoration: none;
}

.read-link:hover {
    color: #2c1810;
}
</style>