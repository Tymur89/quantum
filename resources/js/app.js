import { createApp } from 'vue';
import FeedbackForm from './components/FeedbackForm.vue';

const app = createApp({});

app.component('feedback-form', FeedbackForm);
app.mount('#app');
