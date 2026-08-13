<template>
    <div class="action-buttons">
        <router-link to="/" class="btn btn-outline bo-rounded">
            ⬅️ Tiếp tục mua sắm
        </router-link>
        <a :href="zaloUrl" target="_blank" class="btn btn-zalo bo-rounded">
            💬 Chat Zalo xác nhận đơn nhanh
        </a>
    </div>
</template>

<script setup>
defineProps({
    zaloUrl: { type: String, default: 'https://zalo.me/0988000000' }
})
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.action-buttons {
    display: flex;
    gap: 16px;
    justify-content: center;
    margin-top: 10px;
}

.btn {
    padding: 12px 24px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: opacity 0.2s;
}

.btn:hover {
    opacity: 0.9;
}

.btn-outline {
    border: 1px solid var(--wd-wood-900, #2c1810);
    color: var(--wd-wood-900, #2c1810);
    background: transparent;
}

.btn-zalo {
    background: #0068ff;
    color: #ffffff;
    border: none;
}

@media (max-width: 600px) {
    .action-buttons {
        flex-direction: column;
    }
}
</style>