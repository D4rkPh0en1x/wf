SELECT agent_code, SUM(amount) AS sales_amount, COUNT(id) AS orders_count
FROM orders
WHERE amount >= 1000
GROUP BY agent_code
ORDER BY AVG(amount) DESC;
