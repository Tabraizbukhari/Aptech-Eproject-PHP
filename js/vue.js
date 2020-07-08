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
      changes: function(){
        this.page = 0;
        this.limit= 10;
        this.images= [];
        this.infiniteId = new Date();
      },

    infiniteimages($state) {
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

      deletepost: function(postid){
        var $this = this;
        swal({
          title: "Are you sure?",
          text: "You want to delete this image!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            axios.get('api/deletepost.php', {
              params: {
                id: postid,
              },
            }).then(function (response) {
              swal("Successfully! Your imaginary file has been deleted!", {
                icon: "success",
              });
            $this.changes();
            })
          }
        });
   

      },
      
    },//method end
   
  })





  const category = new Vue({
    el: '#category',
    data: {
      message: 'Your Images',
      limit: 10,
      page: 0,
      posts:[],
      id:null,
      infiniteId: new Date(),
    },
    methods:{
      changes: function(){
        this.page = 0;
        this.limit= 10;
        this.posts= [];
        this.infiniteId = new Date();
      },

    infiniteimages($state) {
        if (this.processing === true) {
          return;
      } 
      this.processing = true;
          setTimeout(() => {
          axios.get('api/Categorypost.php', {
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