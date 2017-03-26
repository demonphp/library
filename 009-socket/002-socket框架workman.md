# 1.官网
    http://www.workerman.net/workerman

# 2.WorkerMan已经支持的协议

  // text协议
  $text_worker = new Worker('text://0.0.0.0:2346');

  // frame协议
  $frame_worker = new Worker('frame://0.0.0.0:2347');

  // tcp Worker，直接基于socket传输，不使用任何应用层协议
  $tcp_worker = new Worker('tcp://0.0.0.0:2348');

  // udp Worker，不使用任何应用层协议
  $udp_worker = new Worker('udp://0.0.0.0:2349');

  // unix domain Worker，不使用任何应用层协议
  $unix_worker = new Worker('unix:///tmp/wm.sock');