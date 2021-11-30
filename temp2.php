foreach ($keys as $key) {
  if (isEmpty($answers[$key])) {
    foreach ($rules as $rule) {
      if ($key == $rule->if_atr) {
        if ($answers[$key] == $rule->if_value){
          $rule->used = true;
        }
      }
    }
    // dump2($answers[$key]);
  }
}