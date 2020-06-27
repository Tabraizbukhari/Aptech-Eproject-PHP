
"use strict";
    const notification = new Vue({
    el: '#myprofile',
    data: {
      message: 'Your Images',
      limit: 10,
      page: 0,
      images:[],
      infiniteId: new Date(),
    },
    methods:{
      
    infiniteimages($state) {
      console.log('done');
        if (this.processing === true) {
          return;
      } 
      this.processing = true;
          setTimeout(() => {
          axios.get('api/apimyprofile.php', {
                params: {
                  active: this.isActive,
                  limit: this.limit,
                  page: this.page,
                },
          }).then(({ data }) => {
              console.log(data);
            if (data.length) {

                setTimeout(() => {
                    this.page += this.limit;
                    this.limit += 10;
                    this.images.push(...data);

                    $state.loaded();
                
                }, 1000);
              }else{
                $state.complete();
              }
              this.processing = false;
            }) }, 1000);
      },
    },
   
  })