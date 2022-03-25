<template>
  <div class="header">
    <div class="logo">
      <img src="https://duckduckgo.com/assets/logo_header.alt.v108.svg" alt="Logo">
      <p>Рога и копыта</p>
    </div>
  </div>
</template>

<style lang="scss">
.header {
  background-color: wheat;
  height: 100px;
  width: 200vw;
  margin: 0;
  display: flex;
  align-items: center;
  padding: 0 10%;

  .logo {
    width: 64px;
    height: 64px;
    display: flex;
    align-items: center;

    p {
      margin-left: 30px;
      font-size: 24px;
      white-space: nowrap;
    }
  }
}
</style>
