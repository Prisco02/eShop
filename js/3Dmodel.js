scene = new THREE.Scene();
scene.background = new THREE.Color(0xdddddd);

camera = new THREE.PerspectiveCamera(40,window.innerWidth/window.innerHeight,1,5000);
camera.rotation.y = 45/180*Math.PI;
camera.position.x = 800;
camera.position.y = 100;
camera.position.z = 1000;

renderer = new THREE.WebGLRenderer({antialias:true});
renderer.setSize(window.innerWidth,window.innerHeight);
document.body.appendChild(renderer.domElement);

hlight = new THREE.AmbientLight (0x404040,100);
scene.add(hlight);

directionalLight = new THREE.DirectionalLight(0xffffff,100);
directionalLight.position.set(0,1,0);
directionalLight.castShadow = true;
scene.add(directionalLight);

light = new THREE.PointLight(0xc4c4c4,10);
light.position.set(0,300,500);
scene.add(light);

light2 = new THREE.PointLight(0xc4c4c4,10);
light2.position.set(500,100,0);
scene.add(light2);

light3 = new THREE.PointLight(0xc4c4c4,10);
light3.position.set(0,100,-500);
scene.add(light3);

light4 = new THREE.PointLight(0xc4c4c4,10);
light4.position.set(-500,300,500);
scene.add(light4);

let loader = new THREE.GLTFLoader();
loader.load('scene.gltf', function(gltf){
  car = gltf.scene.children[0];
  car.scale.set(0.5,0.5,0.5);
  scene.add(gltf.scene);
  animate();
});