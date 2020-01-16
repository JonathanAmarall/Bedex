export default {
    state: {
        items: []
    },
    mutations: {
        LOAD_NOTIFICATIONS(state, notifications) {
            state.items = notifications;
        },
        MARK_AS_READ(state, id) {
            let index = state.items
                .filter(notification => notification.id == id);
            state.items.splice(index, 1);
        },
        MARK_ALL_AS_READ(state) {
            state.items = [];
        }
    },
    actions: {
        loadNotifications(context) {
            axios.get("/notifications")
                .then(res => {
                    context.commit('LOAD_NOTIFICATIONS', res.data.notifications);
                });
            context.dispatch('loadNotificationsForTime');
        },
        markAsRead(context, params) {
            axios.put("/notification-read", params)
                .then(() => {
                    context.commit('MARK_AS_READ', params.id)
                })
        },
        markAllAsRead(context) {
            axios.put("/notification-readall")
                .then(() => {
                    context.commit('MARK_ALL_AS_READ')
                });

        },
        loadNotificationsForTime({ dispatch }) {
            setInterval(() => {
                dispatch('loadNotifications');
            }, 60000);
        }
    }
}