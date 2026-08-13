<template>
    <div class="order-summary-card bo-rounded">
        <div class="summary-header">
            <div>
                <h2 class="order-code">Đơn hàng #{{ order.code }}</h2>
                <span class="order-date">Ngày đặt: {{ order.createdDate }}</span>
            </div>
            <div class="status-tag" :class="order.currentStatusClass">
                {{ order.currentStatusText }}
            </div>
        </div>

        <!-- Timeline các bước -->
        <div class="timeline-container">
            <div v-for="(step, idx) in order.steps" :key="idx" class="timeline-step"
                :class="{ 'completed': step.isDone, 'active': step.isActive }">
                <div class="step-icon-wrapper">
                    <span class="step-icon">{{ step.icon }}</span>
                </div>
                <div class="step-content">
                    <span class="step-title">{{ step.title }}</span>
                    <span class="step-time">{{ step.time || 'Chưa thực hiện' }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    order: { type: Object, required: true }
})
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.order-summary-card {
    background: #ffffff;
    border: 1px solid #e8e2d9;
    padding: 24px;
}

.summary-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #eee;
}

.order-code {
    font-size: 20px;
    color: #2c1810;
    margin: 0;
}

.order-date {
    font-size: 13px;
    color: #777;
}

.status-tag {
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    background: #fff3cd;
    color: #856404;
}

.timeline-container {
    display: flex;
    justify-content: space-between;
    position: relative;
    margin: 20px 0;
}

.timeline-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1;
}

.step-icon-wrapper {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-bottom: 8px;
    border: 2px solid #ddd;
}

.timeline-step.completed .step-icon-wrapper {
    background: #d4edda;
    border-color: #28a745;
}

.timeline-step.active .step-icon-wrapper {
    background: #fff3cd;
    border-color: #ffc107;
}

.step-title {
    font-size: 13px;
    font-weight: 600;
    color: #2c1810;
    display: block;
}

.step-time {
    font-size: 11px;
    color: #888;
}

@media (max-width: 768px) {
    .timeline-container {
        flex-direction: column;
        gap: 20px;
        align-items: start;
    }

    .timeline-step {
        flex-direction: row;
        gap: 12px;
        text-align: left;
    }
}
</style>