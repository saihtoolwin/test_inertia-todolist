// const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"todos.index":{"uri":"todos","methods":["GET","HEAD"]},"todos.store":{"uri":"todos","methods":["POST"]},"todos.delete":{"uri":"todos\/{id}","methods":["DELETE"],"parameters":["id"]}}};
// if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
//   Object.assign(Ziggy.routes, window.Ziggy.routes);
// }
// export { Ziggy };


const Ziggy = {
  url: 'https://ziggy.test',
  port: null,
  routes: {
      home: {
          uri: '/',
          methods: [ 'GET', 'HEAD'],
          domain: null,
      },
      login: {
          uri: 'login',
          methods: ['GET', 'HEAD'],
          domain: null,
      },
  },
};

export { Ziggy };