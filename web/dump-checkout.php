<?php
$order = \Drupal\commerce_order\Entity\Order::load(2);
if (!$order) { echo "Order 2 niet gevonden\n"; return; }
$flow = \Drupal::entityTypeManager()->getStorage('commerce_checkout_flow')->load('default');
echo "CHECKOUT FLOW: " . ($flow ? $flow->id() : 'default') . "\n";
echo "STEPS:\n";
$plugin = $flow ? $flow->getPlugin() : NULL;
if ($plugin) {
  foreach ($plugin->getSteps() as $key => $step) {
    echo "  - {$key}: " . (is_array($step) && isset($step['label']) ? (string) $step['label'] : '') . "\n";
  }
}
