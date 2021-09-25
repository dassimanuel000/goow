<template>
  <div class="content dontCloseOnClick">
    <div
      v-for="activity in filteredActivities"
      :key="`filter_activity_${activity.title}`"
      class="content-item text_transform"
      :style="'background-color: ' + activity.color"
      @click="handleActivity(activity.id)"
    >
      <div>{{ activity.title }}</div>
      <img :src="$api_storage_url + activity.icon" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'ActivitiesDropDownContent',
  data() {
    return {
      activities: [],
      choosenActivity: null,
    }
  },
  computed: {
    filteredActivities() {
      return this.activities.filter((item) => item.icon)
    },
  },
  mounted() {
    this.loadActivities()
  },
  methods: {
    loadActivities() {
      this.$axios.$get('activities').then((res) => {
        this.activities = res.activities
      })
    },
    handleActivity(activity) {
      this.choosenActivity = activity
      this.$nuxt.$emit('filterChanged', {
        filterName: 'activity',
        value: this.choosenActivity,
      })
    },
  },
}
</script>

<style lang="scss" scoped>
.content {
  width: 816px;
  padding: 22px 28px 28px 18px;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  &-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    margin-left: 10px;
    margin-bottom: 12px;
    border-radius: 30px;
    padding: 9px 8px 10px 10px;
    img {
      margin-left: 10px;
      width: 20px;
    }
  }
}
</style>
